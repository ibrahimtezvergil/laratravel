<?php

namespace App\Http\Controllers\Api;

use App\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return  response()->json(Slider::orderBy('rank', 'asc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Slider();

        $validated = $request->validate([
            'title'=> ['required'],
            'image'=> ['required'],
            'catId'=> ['required'],
        ]);
        if ($validated){
            $image = $request->image;
            $filename = Str::random(10).time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            $data->image=$filename;


            $data->title=Str::title($request->title);
            $data->catId=$request->input('catId');
            $data->url=$request->input('url');
            $data->rank=0;
            if($data->save()){
                $file = file_exists(public_path().'/upload/slider/'.$data->catId);
                if (!$file){
                    mkdir(public_path().'/upload/slider/'.$data->catId);
                }

                \Image::make($image)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save(public_path().'/upload/slider/'.$data->catId.'/'.$filename);
                return response()->json(["success"=> "Ekleme Başarılı","data"=>$data],200);
            }
            else{
                return response()->json(["error"=> "Ekleme Başarısız","data"=>$data],400);

            }
        }
        else{
            return response()->json(["error"=> "Veriler Eksik","data"=>$data],400);

        }
        return response()->json(["error"=> "Veriler Eksik","data"=>$data],400);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data=Slider::findOrFail($id);

        $validated = $request->validate([
            'title'=> ['required'],
            'url'=> ['required'],
        ]);

        if ($validated){

            $data->title=Str::title($request->title);
            $data->url=$request->input('url');

            if($data->save()){

                return response()->json(["success"=> "Ekleme Başarılı","data"=>$data],200);
            }
            else{
                return response()->json(["error"=> "Ekleme Başarısız","data"=>$data],400);

            }
        }
        else{
            return response()->json(["error"=> "Veriler Eksik","data"=>$data],400);

        }
        return response()->json(["error"=> "Veriler Eksik","data"=>$data],400);


    }

    public function rankUpdate(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required'],
            'rank' => ['required'],
        ]);
        if ($validated){
            $id=$request->id;
            $data = Slider::findOrFail($id);
            $data->rank=$request->rank;
            if ($data->save()){
                return response()->json(["data" => $data],200);

            }
            else{
                return response()->json(["error" => "İşlem Başarısız"],400);

            }
        }
        else{
            return response()->json(["error" => "İşlem Başarısız"],400);

        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Slider::findOrFail($id);
        if($data->delete()){
            if(\File::exists(public_path().'/upload/slider/'.$data->catId.'/'.$data->image)) {

                \File::delete(public_path().'/upload/slider/'.$data->catId.'/'.$data->image);
            }
            return response()->json([
                "status"=>"200",
                "data"=>$data,
                "path"=>public_path().'/upload/slider/'.$data->catId.'/'.$data->image

            ]);
        }

    }
}
