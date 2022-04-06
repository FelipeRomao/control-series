<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/{id}', function ($id) {
    return new \App\Http\Resources\UserResource(\App\User::findOrFail($id));
});

Route::get('/users', function () {
    return \App\Http\Resources\UserResource::collection(\App\User::all());
});

Route::get('/series', function () {
    return \App\Http\Resources\SerieResource::collection(\App\Serie::all());
});
