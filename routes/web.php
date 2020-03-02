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
    return view('home');
})->name('home');

Route::get('/inventory/upload', 'inventoryController@show')->name('upload');
Route::get('/inventory/list', 'inventoryController@list')->name('list');
Route::get('/inventory/detail/{id}', 'inventoryController@detail')->name('detail');
Route::get('/inventory/create', 'inventoryController@create')->name('create');
Route::get('/inventory/edit/{id}', 'inventoryController@edit')->name('edit');

Route::post('/inventory/save', 'inventoryController@save')->name('save');
Route::post('/inventory/uploadFile', 'inventoryController@uploadFile')->name('uploadFile');

Route::get('/proyect', function () {
    return view('proyect.show');
})->name('proyect');
