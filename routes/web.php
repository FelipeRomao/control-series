<?php

Route::get('/series', 'SeriesController@index')->name('series-list');
Route::get('/series/create', 'SeriesController@create')->name('form-create-serie');
Route::post('/series/create', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroy');
Route::post('/series/{id}/updateName', 'SeriesController@updateName');

Route::get('/series/{serieId}/seasons', 'SeasonsController@index');

Route::get('/seasons/{season}/episodes', 'EpisodesController@index');
Route::post('/seasons/{season}/episodes/watch', 'EpisodesController@watch');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/begin', 'BeginController@index');
Route::post('/begin', 'BeginController@signIn');

Route::get('/signUp', 'RegisterController@create');
Route::post('/signUp', 'RegisterController@store');

