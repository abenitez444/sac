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

Route::get('/', function () {
    return redirect()->route('home');
});


Route::group(['prefix' => 'inventory'], function () {

	Route::get('/index', 'inventoryController@index')->name('index');
	Route::get('/upload', 'inventoryController@show')->name('upload');
	Route::get('/create', 'inventoryController@create')->name('create');
	Route::get('/edit/{id}', 'inventoryController@edit')->name('edit');
	Route::get('/detail/{id}', 'inventoryController@detail')->name('detail');
	Route::post('/save', 'inventoryController@save')->name('save');
	Route::post('/uploadFile', 'inventoryController@uploadFile')->name('uploadFile');
	Route::put('/deleted','inventoryController@destroy')->name('inventory.deleted');

});

/*CRUD PROYECT*/
Route::group(['prefix' => 'project'], function () {

	Route::get('/index', 'projectController@index')->name('project.index');
	Route::get('/show/{project}', 'projectController@show')->name('project.show');
	Route::get('/edit/{project}', 'projectController@edit')->name('project.edit');
	Route::get('/kanban/{project}', 'projectController@kanban')->name('project.kanban');

	Route::post('/store', 'projectController@store')->name('project.store');

});

/*Route::get('/home', '*/


Route::group(['prefix' => 'list'], function () {

    Route::get('/index/{id}', 'listController@index')->name('list.index');
    Route::post('/create', 'listController@create')->name('list.create');
    Route::post('/move', 'listController@move')->name('list.move');
    Route::post('/edit', 'listController@edit')->name('list.edit');
    Route::post('/show', 'listController@show')->name('list.show');
	Route::post('/deleted', 'listController@deleted')->name('list.deleted');
});


Route::group(['prefix' => 'activity'], function () {

    Route::post('/create', 'activityController@create')->name('activity.create');
    Route::post('/move', 'activityController@move')->name('activity.move');
    Route::post('/edit', 'activityController@edit')->name('activity.edit');
    Route::post('/show', 'activityController@show')->name('activity.show');
	Route::post('/deleted', 'activityController@deleted')->name('activity.deleted');

});

Route::group(['prefix' => 'employee'], function () {

	Route::get('/index', 'employeeController@index')->name('employee.index');
	Route::get('/create', 'employeeController@create')->name('employee.create');
	Route::get('/detail/{id}', 'employeeController@detail')->name('employee.detail');
	Route::get('/edit/{id}', 'employeeController@edit')->name('employee.edit');
	Route::post('/save', 'employeeController@save')->name('employee.save');
	Route::put('/deleted','employeeController@destroy')->name('employee.deleted');
});

Auth::routes();