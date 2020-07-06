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
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//Thread
Route::get('/home','HomeController@index');
Route::post('/home','ThreadsController@store');
Route::delete('/{thread}', 'ThreadsController@destroy');
Route::get('/profile/{id}', 'HomeController@show');

//Comment
Route::post('/comment','CommentsController@store');
