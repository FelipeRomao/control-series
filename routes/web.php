<?php

Route::get('/series', 'SeriesController@index')->name('series-list');
Route::get('/series/create', 'SeriesController@create')->name('form-create-serie')->middleware('authenticator');
Route::post('/series/create', 'SeriesController@store')->middleware('authenticator');
Route::delete('/series/{id}', 'SeriesController@destroy')->middleware('authenticator');
Route::post('/series/{id}/updateName', 'SeriesController@updateName')->middleware('authenticator');

Route::get('/series/{serieId}/seasons', 'SeasonsController@index');

Route::get('/seasons/{season}/episodes', 'EpisodesController@index');
Route::post('/seasons/{season}/episodes/watch', 'EpisodesController@watch')->middleware('authenticator');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/begin', 'BeginController@index');
Route::post('/begin', 'BeginController@signIn');

Route::get('/signUp', 'RegisterController@create');
Route::post('/signUp', 'RegisterController@store');

Route::get('logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/begin');
});

Route::get('/show-email', function () {
    return new \App\Mail\NewSerie('The Vikings', 12,3);
});

Route::get('/send-email', function () {

    $email = new \App\Mail\NewSerie('The Vikings', 12,3);
    $user = (object)['email' => 'feliperomao@gmail.com', 'name' => 'Felipe Romao'] ;

    return 'Email sent :)';

});

