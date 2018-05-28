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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'SiswaController@create')->name('create');
Route::post('/store', 'SiswaController@store')->name('store');
Route::get('/edit/{id}', 'SiswaController@edit')->name('edit');
Route::post('/update', 'SiswaController@update')->name('update');
Route::get('/delete/{id}', 'SiswaController@delete')->name('delete');
