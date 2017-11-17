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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::post('/search', 'SearchController@index');

Route::get('/upload', 'UploadController@index');

Route::post('/upload', 'UploadController@process');

Route::post('/fine-upload', 'UploadController@upload');

Route::get('/video/{video}', 'VideoController@index');
