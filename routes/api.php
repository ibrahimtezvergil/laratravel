<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('singup', 'AuthController@singup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');


});
Route::apiResource('/article','Api\ArticleController');
Route::post('/article/fileupload/{id}', 'Api\ArticleController@fileupload');
Route::get('/article/getmultiimage/{id}', 'Api\ArticleController@getmultiimage');
Route::post('/article/removeimg', 'Api\ArticleController@removeimg');
Route::apiResource('/category','Api\CategoryController');
Route::post('/category/rankupdate', 'Api\CategoryController@rankUpdate');
Route::apiResource('/settings','Api\SettingController');
Route::apiResource('/sliders','Api\SliderController');
Route::post('/sliders/rankupdate', 'Api\SliderController@rankUpdate');



Route::get('/web/index','Api\web\IndexController@index');
Route::get('/web/blog/{slug}','Api\web\BlogController@index');
