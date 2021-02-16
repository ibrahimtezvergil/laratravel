<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return  response()->json(Category::orderBy('rank', 'asc')->get());
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
        $data=new Category();

        $validated = $request->validate([
            'title'=> ['required'],
        ]);
        if ($validated){
            $data->title=$request->input('title');
            $data->sub_title=$request->input('sub_title');
            $data->slug=Str::slug($request->input('title'),"-");
            $data->parent_id=$request->input('parent_id');
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
        $data = Category::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required']
        ]);
        if ($validated){
            $data->title=$request->input('title');
            $data->sub_title=$request->input('sub_title');
            $data->slug=Str::slug($request->input('title'),"-");
            $data->parent_id=$request->input('parent_id');

            if($data->save()){
                return response()->json(["success"=> "İşlem Başarılı","data"=>$data],200);
            }else{
                return response()->json(["error" => "İşlem Başarısız"],400);

            }
        }
        return response()->json(["error" => "İşlem Başarısız"],400);

    }

    public function rankUpdate(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required'],
            'rank' => ['required'],
        ]);
        if ($validated){
            $id=$request->id;
            $data = Category::findOrFail($id);
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
        $data=Category::findOrFail($id);

        if($data->delete()){
            return response()->json([
                "message"=>"İşlem Başarılı.",

            ],200);
        }
    }
}
