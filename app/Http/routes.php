<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Public routes
Route::get('/', function () {
    return view('public.home');
});
Route::get('/about-me', function () {
    return view('public.about-me');
});

// User routes
Route::get('user/sign-up', function () {
    return view('users.sign-up');
});
Route::post('user/do-signup', 'Auth\AuthController@doSignUp');
Route::get('user/login', function () {
    return view('users.login');
});
Route::post('user/do-login', 'Auth\AuthController@doLogin');
Route::get('user/logout', function() {
	Auth::logout();
	return redirect('/');
});

// Gallery and images related routes
Route::get('gallery/list', 'GalleryController@viewGalleryList');
Route::post('gallery/save', 'GalleryController@saveGallery');
Route::get('gallery/delete/{id}', 'GalleryController@deleteGallery');
Route::get('gallery/view/{id}', 'GalleryController@viewGalleryPics');
Route::post('image/do-upload', 'GalleryController@doImageUpload');
