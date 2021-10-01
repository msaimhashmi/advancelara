<?php

use App\Jobs\SendMailJob;
use App\Mail\SendEmailMailable;
use Carbon\now;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


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

Route::get('sendmail', function(){
	SendMailJob::dispatch()->delay(now()->addSeconds(5));
	// Mail::to('saimdigitalop@gmail.com')->send(new SendEmailMailable());
	return 'Mail has been sent successfully!';
});

require __DIR__.'/auth.php';
