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

    // Home Route
    Route::get('home', 'HomeController@index')->name('admin.home');

    // Users Routes
    Route::resource('users', 'UserController')->except(['show']);

    // categories Routes
    Route::resource('categories', 'CategoryController')->except(['show']);

    // skills Routes
    Route::resource('skills', 'SkillController')->except(['show']);

    // Tags Routes
    Route::resource('tags', 'TagController')->except(['show']);

    // pages Routes
    Route::resource('pages', 'PageController')->except(['show']);

    // videos Routes
    Route::resource('videos', 'VideoController')->except(['show']);

});// end of admin routes


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
