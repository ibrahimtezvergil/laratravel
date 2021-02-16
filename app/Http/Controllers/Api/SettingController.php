<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
//        $this->middleware('JWT');

//        $this->middleware('JWT', ['except' => ['']]);

    }
    public function index()
    {
        return  response()->json(Setting::orderBy('id', 'asc')->get());
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
        //
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
    public function update(Request $request, $id=1)
    {
        $data=Setting::findOrFail($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->keywords=$request->keywords;
        $data->author=$request->author;
        $data->revisitAfter=$request->revisitAfter;
        $data->language=$request->language;
        $data->robots=$request->robots;


        if($data->save()){
            return response()->json(["success"=>"Başarılı","data"=>$request->all()],200);

        }
        else{
            return response()->json(["error"=>$data],400);

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
        //
    }
}
