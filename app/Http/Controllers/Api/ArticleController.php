<?php

namespace App\Http\Controllers\Api;

use App\Articles;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Images;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;


class ArticleController extends Controller
{

    public function __construct()
    {
//        $this->middleware('JWT');

        $this->middleware('JWT', ['except' => ['']]);

    }


    public function index()
    {
        $articles=DB::table("articles")  ->leftJoin('categories', 'articles.pageId', '=', 'categories.id')
            ->select('articles.*', 'categories.slug as category',"categories.title as categoryTitle")
            ->where('articles.user_id',Auth::id())->orderBy('articles.created_at', 'desc')->get();

        return response()->json($articles);
    }


    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $image="";
        $filename="";
        $validated = $request->validate([
            'title'=> ['required'],
            'content'=>['required'],
            'tags'=>['required'],
            'coverImg'=>['required'],
        ]);
        if ($validated){
            $data=new Articles();
            if($request->coverImg){
                $image = $request->coverImg;
                $filename = Str::random(10).time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                $data->coverImg=$filename;
            }
            $data->title=Str::title($request->title);
            $data->content=$request->content;
            $data->pageId=$request->pageId;
            $data->user_id=Auth::id();
            $data->tags=implode(',',$request->tags);
            $data->slug=Str::slug($request->title,"-");
            if($data->save()){
                $file = file_exists(public_path().'/upload/article/'.$data->id);
                if (!$file){
                    mkdir(public_path().'/upload/article/'.$data->id);
                }

                \Image::make($image)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save(public_path().'/upload/article/'.$data->id.'/'.$filename);
                return response()->json(["success"=> "Ekleme Başarılı","data"=>$data],200);
            }
            else{
                return response()->json(["error" => "Ekleme Başarısız"],400);
            }
        }
        return response()->json(["error" => "Formu EKsiksiz Doldurunuz"]);
    }
    public function fileupload(Request $request,$id){
        $image=new Images;
        $photos = $request->file('file');
        if (!is_array($photos)) {
            $photos = [$photos];
        }
        $counter=0;
        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $imageName = Str::random(10).time().'.'.$photo->getClientOriginalExtension();
            $image->data_id=$id;
            $image->data_type="article";
            $image->image="$imageName";
            if($image->save()){
                $photo->move(public_path('upload/article/'.$id.'/multi'), $imageName);
                $counter++;
            }
        }
        if($counter==count($photos)){
            return response()->json(["success"=>" Completed"],200);
        }else{
            return response()->json(["errr"=>"Not Completed"],400);
        }
    }
    public function removeimg(Request $request){
        $fileName=$request->deleteImg;
        $imageid=$request->imageid;
        $dataid=$request->dataid;
        if($request->type){
            $data=Images::findOrFail($imageid);

            if(\File::exists(public_path().'/upload/article/'.$dataid.'/multi/'.$fileName)){

                \File::delete(public_path().'/upload/article/'.$dataid.'/multi/'.$fileName);

                if ($data->delete()){
                    return response()->json(["success"=>"İşlem Başarılı"],200);

                }
                return response()->json(["success"=>"İşlem Başarısız"],200);

            }else{
                return response()->json(["success"=>"İşlem Başarısız"],400);
            }
        }
        $data=Articles::findOrFail($dataid);
        if(\File::exists(public_path().'/upload/article/'.$dataid.'/'.$fileName)){
            \File::delete(public_path().'/upload/article/'.$dataid.'/'.$fileName);
            $data->coverImg=null;
            if ($data->save()){
                return response()->json(["success"=>"İşlem Başarılı"],200);

            }
            return response()->json(["success"=>"İşlem Başarısız"],200);

        }else{
            return response()->json(["success"=>"İşlem Başarısız"],400);
        }

        return response()->json(["success"=>$fileName]);
    }
    public function getmultiimage($id){
        $data=Images::where('data_id',$id)->get();
        return response()->json(["data"=>$data],200);
    }
    public function show($id)
    {
        $data=Articles::findOrFail($id);
        return response()->json($data);
    }
    public function update(Request $request, $id)
    {
        $data=Articles::findOrFail($id);
        $validated = $request->validate([
            'title'=> ['required'],
            'content'=>['required'],
            'tags'=>['required'],
//            'coverImg'=>['required'],
        ]);
        if ($validated){
            if($request->coverImg){
                $image = $request->coverImg;
                $filename = Str::random(10).time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                $data->coverImg=$filename;

                \Image::make($image)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save(public_path().'/upload/article/'.$data->id.'/'.$filename);
            }

            $data->title=Str::title($request->title);
            $data->content=$request->content;
            $data->pageId=$request->pageId;
            $data->tags=implode(',',$request->tags);
            $data->slug=Str::slug($request->title,"-");

            if($data->save()){
                return response()->json(["success"=> "Ekleme Başarılı"],200);
            }
            else{
                return response()->json(["error" => "Ekleme Başarısız"],400);
            }

        }
        return response()->json(["error" => "Ekleme Başarısız"],400);

    }

    public function destroy($id)
    {
        $data=Articles::findOrFail($id);
        if($data->delete()){
            return response()->json([
                "status"=>"200"
            ]);
        }

    }
}
