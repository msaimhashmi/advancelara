<?php

use Illuminate\Support\Facades\App;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('form', 'FormController@index')->name('form');
Route::post('form', 'FormController@store');

Route::get('search-view', 'SearchController@index')->name('search.index');
Route::get('search', 'SearchController@search')->name('search.result');

Route::get('/locale/{lang?}', function($lang=null){
	App::setLocale($lang);
	return view('dashboard');
});

require __DIR__.'/auth.php';
