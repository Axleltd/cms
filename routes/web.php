<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
 * OAUTH Token Callback
 * Route::get('callback', function (Illuminate\Http\Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 'client-id',
            'client_secret' => 'client-secret',
            'redirect_uri' => '/callback',
            'code' => ($request->code)? $request->code : dd($request->toArray()),
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});*/

Route::get('/test',function(){
	return view('upload');
});
Route::post('upload',function(Request $request){
	$page = \App\Page::findOrFail(1);
	
	if($page->addMediaFromRequest('image')->toCollection('images')){
		return redirect('/');
	}
	//echo "HEL";
});
Route::get('/admin',function(){
	return view('admin.passport');
});