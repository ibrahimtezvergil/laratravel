<?php

namespace App\Http\Controllers\Api\web;

use App\Category;
use App\Http\Controllers\Controller;
use App\Slider;
use DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $slides=Slider::orderBy('rank', 'asc')->take(10)->get();

        $data=array(
            "slides" => $slides
        );

        $categories=Category::select("slug")->orderBy('rank', 'asc')->get();
        for($i=0; $i < count($categories) ; $i++){
            $key=explode("-",$categories[$i]["slug"]);
            $key=implode("",$key);

            $data[$key]=  DB::table("articles")->leftJoin('categories', 'articles.pageId', '=', 'categories.id')
                ->select('articles.*', 'categories.slug as category')
                ->where('categories.slug',$categories[$i]["slug"])
                ->orderBy('articles.created_at', 'desc')->take(6)->get();
        }



        return response()->json($data);

    }

}
