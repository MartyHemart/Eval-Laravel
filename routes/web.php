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


Route::get('/', 'TopicController@index')->name('home');
Route::get('create', 'TopicController@create')->name('create');
route::get('edit/{topic}', 'TopicController@edit')->name('edit');
//Route::get('show', 'TopicController@show')->name('show');

// Route pour le crud
Route::resource('topics','TopicController');

Auth::routes();

Route::get('/home', 'TopicController@index')->name('home');

route::get('search', 'TopicController@search')->name('search');
