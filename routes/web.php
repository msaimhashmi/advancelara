<?php

use App\Events\TaskEvent;
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

// VALIDATION REQUEST
Route::get('form', 'FormController@index')->name('form');
Route::post('form', 'FormController@store');

// ALGOLIA SEARCH
Route::get('search-view', 'SearchController@index')->name('search.index');
Route::get('search', 'SearchController@search')->name('search.result');

// LOCALIZATION 
Route::get('/locale/{lang?}', function($lang=null){
	App::setLocale($lang);
	return view('dashboard');
});

// QUEUES JOBS
Route::get('sendmail', function(){
	SendMailJob::dispatch()->delay(now()->addSeconds(5));
	// Mail::to('saimdigitalop@gmail.com')->send(new SendEmailMailable());
	return 'Mail has been sent successfully!';
});


// EVENT LISTNERS
Route::get('event', function(){
	event(new TaskEvent('Hey how are you?'));
});

require __DIR__.'/auth.php';
