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
Route::get('/welcome2', function(){
    return view('/welcome2');
});

Route::get('/', 'CarController@index');

Auth::routes();

Route::get('/home', 'CarController@index')->name('home');

/**
 * add routes to crud cars
 */
Route::resource('cars', 'CarController');

/**
 * Route for email confirmation
 * Route for logout
 */

Route::get('/users/confirmation/{activation_code}', 'Auth\RegisterController@confirmation')->name('confirmation');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


/**
 * Routes for information
 */
Route::get('/faq', 'InfoController@showFAQ')->name('faq');
Route::get('/lendCar', 'InfoController@showLendCar')->name('lendCar');
Route::get('/rentCar', 'InfoController@showRentCar')->name('rentCar');
Route::get('/about', 'InfoController@showAbout')->name('about');
Route::get('/agb', 'InfoController@showAGB')->name('agb');
Route::get('/profile', 'ProfileController@editProfile')->name('profile');
Route::get('/profile2', 'ProfileController@showProfile')->name('profile2');


/**
 * Routes for upload and store UserPics
 */
Route::get('upload', 'UploadController@userPicUpload');
Route::post('storeUserPic', 'UploadController@storeUserPic');

Route::get('addCarIMG', 'HomeController@dropzone');
Route::post('dropzone/store', ['as'=>'dropzone.store','uses'=>'HomeController@dropzoneStore']);

/**
 * Routes for edit profile
 */
Route::post('changePassword', 'ProfileController@changePW');
Route::post('changeFirstName', 'ProfileController@changeFname');
Route::post('changeLastName', 'ProfileController@changeLname');
