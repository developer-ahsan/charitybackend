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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('gallery', 'ApiController@gallery');
Route::get('galleryAll', 'ApiController@galleryAll');
Route::get('slider', 'ApiController@slider');

Route::post('login','UserController@login');
Route::post('forgetPassword','UserController@forgetPassword');
Route::post('resetPassword','UserController@resetPassword');
Route::get('test', function() {
	return true;
});
