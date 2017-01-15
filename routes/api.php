<?php

use Illuminate\Http\Request;

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

//Users
Route::get('/users','UserController@index');

//Pages
Route::get('/pages','PageController@index');
Route::get('/pages/{id}','PageController@show');

//Post
Route::get('/posts','PostController@index');
Route::get('/posts/{id}','PostController@show');

//Calendar
Route::get('/calendars','CalendarController@index');
Route::get('/calendars/{id}','CalendarController@show');
//Resource
Route::get('/resources','ResourceController@index');
Route::get('/resources/{id}','ResourceController@show');
//Staff

Route::get('/staffs','StaffController@index');
Route::get('/staffs/{id}','StaffController@show');
//Student

Route::get('/students','StudentController@index');
Route::get('/students/{id}','StudentController@show');
//Gallery

Route::get('/galleries','GalleryController@index');
Route::get('/galleries/{id}','GalleryController@show');
//News
Route::get('/news','NewsController@index');
Route::get('/news/{id}','NewsController@show');
