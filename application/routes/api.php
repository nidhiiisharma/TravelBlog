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
Route::get('posts','PostController@posts');
Route::get('posts/{id}','PostController@postsByID');
Route::post('posts','PostController@postsSave');
Route::put('posts/{id}', 'PostController@postsUpdate');
Route::delete('posts/{id}', 'PostController@postsDelete');

Route::apiResource('posts','PostController');