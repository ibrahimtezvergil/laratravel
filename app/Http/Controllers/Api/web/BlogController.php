<?php

namespace App\Http\Controllers\api\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug="")
    {
        $categorySlug=$slug;
//        $currentPage = request()->get('page', 1);
//        $currentPage = request()->get('category', 1);
//        $articles= Cache::remember('blog-'.$categorySlug .'-'. $currentPage, 10, function() use ($categorySlug){
//            return DB::table("articles")->leftJoin('categories', 'articles.pageId', '=', 'categories.id')
//                ->select('articles.*', 'categories.slug as category')
//                ->where('categories.slug',$categorySlug)
//                ->orderBy('articles.created_at', 'desc')->paginate(2);
//        });
        $articles= DB::table("articles")->leftJoin('categories', 'articles.pageId', '=', 'categories.id')
            ->select('articles.*', 'categories.slug as category')
                ->where('categories.slug',$slug)
            ->orderBy('articles.created_at', 'desc')->paginate(10);

        return response()->json($articles);

    }

    /**
     * Show the aform for creating a new resource.
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
    public function update(Request $request, $id)
    {
        //
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
