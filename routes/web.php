<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::group(['middleware' => ['auth', 'role']], function () {
  Route::resource('home', 'HomeController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => ['auth', 'role']], function () {
  Route::resource('user', 'UserController', ['except' => ['show']]);
});

Route::group(['middleware' => ['auth', 'role']], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

// Route::resource('cars', 'CarsController')->middleware(['auth','role']);
