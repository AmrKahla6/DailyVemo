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

Route::namespace('Backend')->prefix('admin')->group(function(){
    Route::get('/', 'HomeController@index');

    // Users Routes
    Route::resource('users', 'UserController')->except(['show']);
});// end of admin routes


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
