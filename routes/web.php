<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'UserController@CheckLogin');
Route::get('logout', 'Dashboard@logout');
Route::get('login', 'UserController@loginView')->name('login');
Route::get('dashboard', 'Dashboard@dashboardHome');
Route::post('login', 'UserController@Userlogin');

Route::group(['prefix'=>'dashboard'], function(){
	Route::get('gallery', 'Dashboard@galleryView');
	Route::get('deleteGallery/{id}', 'Dashboard@deletegallery');
	Route::get('changeStatus/{status}/{id}', 'Dashboard@changeStatus');
	Route::post('addgallery', 'Dashboard@addgallery');
// Sliders
	Route::get('slider', 'Dashboard@sliderView');
	Route::get('deleteSlider/{id}', 'Dashboard@deleteslider');
	Route::get('changeSlider/{status}/{id}', 'Dashboard@changeSlider');
	Route::post('addslider', 'Dashboard@addslider');


	Route::get('updatePassword', 'Dashboard@updatePasswordView');
	Route::post('updatePassword', 'Dashboard@updatePassword');
	Route::get('updateProfile', 'Dashboard@updateProfileView');
	Route::post('updateProfile', 'Dashboard@updateProfile');
	Route::get('worksamples', 'Dashboard@worksamples');
});
