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
Route::get('/profil', 'InfoController@showProfill')->name('profil');
