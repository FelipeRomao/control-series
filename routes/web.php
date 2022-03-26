<?php

Route::get('/series', 'SeriesController@index')->name('series-list');
Route::get('/series/create', 'SeriesController@create')->name('form-create-serie');
Route::post('/series/create', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroy');
Route::post('/series/{id}/updateName', 'SeriesController@updateName');

Route::get('/series/{serieId}/seasons', 'SeasonsController@index');
