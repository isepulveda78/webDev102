<?php

use Illuminate\Support\Facades\Route;
use App\Series;


Route::get('/', function () {
    $featuredSeries = Series::take(3)->latest()->get();
    return view('front', compact('featuredSeries'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/series', 'SeriesController');
Route::get('/series/{series}/episodes/{episodeNumber}', 'SeriesController@episode')->name('series.episode')->middleware(['auth','check-subscription']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('payment', 'PaymentController@payment');
Route::post('subscribe', 'PaymentController@subscribe');
Route::post('cancel', 'PaymentController@cancel')->name('cancel');