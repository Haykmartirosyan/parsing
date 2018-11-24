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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'ParsingController@settings');
Route::get('/result', 'ParsingController@index');
Route::get('/parsing/getResult', 'ParsingController@getResult');
Route::get('/parsing/delete-result', 'ParsingController@deleteResult')->name('delete-result');
