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



Auth::routes();
Route::resource('send_photo','SendphotoController');


Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/activitis', 'HomeController@activitis')->name('activitis');
//activity Gallery Related Route

Route::get('/activitis_gallery/{name}', 'HomeController@activityRelatedGallery')->name('activitis_gallery');

//activity Gallery  album Related Route
Route::get('/activitis_gallery_album/{id}', 'HomeController@activitis_gallery_album')->name('activitis_gallery_album');





Route::group([ 'as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']], function (){

    Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('submit_photo','SendPhotoController');
    Route::resource('picture','PictureController');
    Route::resource('slider','SliderController');

    Route::post('/deleteslider','SliderController@delete');
    Route::resource('lupsActivity','LupsActivity');
    Route::resource('photo_gallery','PhotoGalleryController');
    Route::post('deleteGallery','PhotoGalleryController@deleteGallery');

    Route::post('/deleteactivity','LupsActivity@delete');

    Route::delete('/submit_photo/delete/{id}','SendPhotoController@delete')->name('submit_photo.delete');


});
