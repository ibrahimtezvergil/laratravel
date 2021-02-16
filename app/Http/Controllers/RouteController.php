<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $seo=Setting::where('id', 1)->limit(1)->get();
        $title=$seo[0]["title"];
        $keywords=$seo[0]["keywords"];
        $description=$seo[0]["description"];
        $author=$seo[0]["author"];
        $revisitAfter=$seo[0]["revisitAfter"];
        $language=$seo[0]["language"];
        $robots=$seo[0]["robots"];
        if ($robots==1){
             $robots="index, follow";
        }else{
            $robots="noindex, nofollow";
        }
        $meta="";
        $title != '' ? $meta.="<title>$title</title>" : $meta;
        $keywords != '' ? $meta.="<meta name='keywords' content='$keywords'>" : $meta;
        $description != '' ? $meta.="<meta name='description' content='$description'>" : $meta;
        $author != '' ? $meta.="<meta name='author' content='$author'>" : $meta;
        $revisitAfter != '' ? $meta.="<meta name='revisit-after' content='$revisitAfter days'>" : $meta;
        $language != '' ? $meta.="<meta name='language' content='$language'>" : $meta;
        $robots != '' ? $meta.="<meta name='robots' content='$robots'>" : $meta;


        if($request->segment(1) == "panelim"){


            return view("layouts.panel",compact("meta"));
        }
        else{
            return view("layouts.web",compact("meta"));
        }
//        else{
//            return redirect('/');
////
//        }

    }
}
