<?php

use Illuminate\Support\Facades\Route;
use App\Series;

Route::get('/', function () {
    $featured = Series::take(3)->latest()->get();
    return view('front', compact('featured'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/series', 'SeriesController');

Route::get('/series/{series}/episodes/{episodeNumber}', 'SeriesController@episode')->name('series.episode')->middleware(['auth']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
