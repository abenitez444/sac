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

Route::group(['prefix' => 'inventory'], function () {

	Route::get('/index', 'inventoryController@index')->name('index');
	Route::get('/upload', 'inventoryController@show')->name('upload');
	Route::get('/detail/{id}', 'inventoryController@detail')->name('detail');
	Route::get('/create', 'inventoryController@create')->name('create');
	Route::get('/edit/{id}', 'inventoryController@edit')->name('edit');
	Route::post('/save', 'inventoryController@save')->name('save');
	Route::post('/uploadFile', 'inventoryController@uploadFile')->name('uploadFile');

});

/*CRUD PROYECT*/
Route::group(['prefix' => 'proyect'], function () {

	Route::get('/index', 'proyectController@index')->name('proyect.index');
	Route::get('/show/{proyect}', 'proyectController@show')->name('proyect.show');
	Route::get('/edit/{proyect}', 'proyectController@edit')->name('proyect.edit');
	Route::post('/store', 'proyectController@store')->name('proyect.store');

});

/*Route::get('/home', '*/

Route::group(['prefix' => 'kanban'], function () {
    Route::get('/list/{id}', 'kanbanController@list')->name('kanban.list');
    Route::post('/list/create', 'kanbanController@createList')->name('kanban.createList');
    Route::post('/list/order', 'kanbanController@moveList')->name('kanban.moveList');
    Route::post('/task/create', 'kanbanController@createTask')->name('kanban.createTask');
    Route::post('/moveTask', 'kanbanController@moveTask')->name('kanban.moveTask');
});

Auth::routes();