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
	logger('welcome route.');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::post('/home', 'App\Http\Controllers\HomeController@delete')->name('form_delete');
Route::post('/post', 'App\Http\Controllers\TwitterController@tweet')->name('tweet');

Route::get('/edit', 'App\Http\Controllers\HomeController@edit')->name('form_edit');

Route::post('/edit', 'App\Http\Controllers\HomeController@update')->name('form_update');

Route::get('/form', 'App\Http\Controllers\FormController@showPage');
Route::post('/form', 'App\Http\Controllers\FormController@postTweet');

Route::get('/home/search', 'App\Http\Controllers\SearchController@search')->name('search');
