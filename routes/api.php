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
Route::post('/posts','PostController@store');
Route::put('/posts/{id}','PostController@update');
Route::delete('/posts/{id}','PostController@destroy');

//Resource
Route::get('/resources','ResourceController@index');
Route::get('/resources/{id}','ResourceController@show');
Route::post('/resources','ResourceController@store');
Route::put('/resources/{id}','ResourceController@update');
Route::delete('/resources/{id}','ResourceController@destroy');


//Staff
Route::get('/staffs','StaffController@index');
Route::get('/staffs/{id}','StaffController@show');
Route::post('/staffs','StaffController@store');
Route::put('/staffs/{id}','StaffController@update');
Route::delete('/staffs/{id}','StaffController@destroy');


//Student
Route::get('/students','StudentController@index');
Route::get('/students/{id}','StudentController@show');
Route::post('/students','StudentController@store');
Route::put('/students/{id}','StudentController@update');
Route::delete('/students/{id}','StudentController@destroy');

//Gallery
Route::get('/galleries','GalleryController@index');
Route::get('/galleries/{id}','GalleryController@show');

Route::put('/galleries/{id}','GalleryController@update');
Route::delete('/galleries/{id}','GalleryController@destroy');

//News
Route::get('/news','NewsController@index');
Route::get('/news/{id}','NewsController@show');
Route::post('/news','NewsController@store');
Route::put('/news/{id}','NewsController@update');
Route::delete('/news/{id}','NewsController@destroy');

//News
Route::get('/courses','CourseController@index');
Route::get('/courses/{id}','CourseController@show');
Route::post('/courses','CourseController@store');
Route::put('/courses/{id}','CourseController@update');
Route::delete('/courses/{id}','CourseController@destroy');

//Program
Route::get('/programs','ProgramController@index');
Route::get('/programs/{id}','ProgramController@show');
Route::post('/programs','ProgramController@store');
Route::put('/programs/{id}','ProgramController@update');
Route::delete('/programs/{id}','ProgramController@destroy');
