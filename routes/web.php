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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/inventory/index', 'inventoryController@index')->name('index');
Route::get('/inventory/upload', 'inventoryController@show')->name('upload');
Route::get('/inventory/detail/{id}', 'inventoryController@detail')->name('detail');
Route::get('/inventory/create', 'inventoryController@create')->name('create');
Route::get('/inventory/edit/{id}', 'inventoryController@edit')->name('edit');

Route::post('/inventory/save', 'inventoryController@save')->name('save');
Route::post('/inventory/uploadFile', 'inventoryController@uploadFile')->name('uploadFile');

/*CRUD PROYECT*/
Route::get('/proyect/index', 'proyectController@index')->name('proyect.index');
Route::get('/proyect/show', 'proyectController@show')->name('proyect.show');
Route::get('/proyect/upload', 'proyectController@show')->name('proyect.upload');
Route::get('/proyect/detail/{id}', 'proyectController@detail')->name('proyect.detail');
Route::get('/proyect/create', 'proyectController@create')->name('proyect.create');
Route::get('/proyect/edit/{id}', 'proyectController@edit')->name('proyect.edit');

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
