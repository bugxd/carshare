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
Route::get('/faq', 'InfoController@index')->name('faq');
Route::get('/lendCar', 'InfoController@index1')->name('lendCar');
Route::get('/rentCar', 'InfoController@index2')->name('rentCar');
Route::get('/about', 'InfoController@index3')->name('about');
Route::get('/agb', 'InfoController@index4')->name('agb');

/**
 * Routes for dropdown
 */
Route::get('/create', 'CarController@index1')->name('create');
Route::get('/show', 'CarController@index2')->name('show');
Route::get('/edit', 'CarController@index3')->name('edit');
Route::get('/profil', 'InfoController@index5')->name('profil');
