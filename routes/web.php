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
Route::get('/jurusan','FirebaseController@index')->name('jurusan');
Route::post('/jurusan','FirebaseController@addData')->name('add_jurusan');
Route::get('/jurusan/{id}/materi','MateriController@index')->name('materi');
Route::post('/jurusan/{id}/materi','MateriController@addMateri')->name('add_materi');
Route::get('/nabi','NabiController@index')->name('nabi');
Route::post('/nabi','NabiController@addData')->name('add_nabi');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
