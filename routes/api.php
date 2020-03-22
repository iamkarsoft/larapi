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

Route::post('/register', 'RegisterController@register');

Route::group(['prefix' => 'topics'], function () {
	Route::get('/', 'TopicController@index');
	Route::get('/{topic}', 'TopicCOntroller@show');
	Route::post('/', 'TopicController@store')->middleware('auth:api');
	Route::patch('/{topic}', 'TopicController@update')->middleware('auth:api');
	Route::delete('/{topic}', 'TopicController@destroy')->middleware('auth:api');
});
