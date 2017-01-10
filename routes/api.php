<?php

use Illuminate\Http\Request;
use Spatie\Fractalistic\Fractal;
use Axle\Transformers\UserTransformer;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/pages',function(Request $request){
    $pages = \App\Page::all();
    return \Spatie\Fractalistic\Fractal::create()
        ->collection($pages)
        ->transformWith(new \Axle\Transformers\PageTransformer())
        ->toArray();

Route::get('/users',function(){

	$users = \App\User::all();

	return Fractal::create()
	   ->collection($users)
	   ->transformWith(new UserTransformer())
	   ->toArray();

});