<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

/* 
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello World</h1>';
});

Route::get('/users/{id}/{name}', function($id, $name) {
    return 'This is user '.$name. ' with an id of ' .$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/account', 'PagesController@account');
Route::resource('posts', 'PostController');
Route::get('/destinations', 'PagesController@destinations');

Route::get('/account', 'UserController@account');
Route::post('/account', 'UserController@update_avatar');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update', ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::get('users/edit/',function()
{
    if (Gate::allows('loggedINOnly', Auth::user)) {
        return view('users/update');
    }
    else{
        return view('/home');
    }
});

Route::post('posts/{post}/comments', 'CommentController@store');
Route::get('/getPDF', "PDFController@getPDF");