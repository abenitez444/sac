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

    Route::group(['prefix' => 'balance'], function () {

	Route::get('/index', 'balanceController@index')->name('balance.index');
	Route::get('/create', 'balanceController@create')->name('balance.create');
	Route::post('/store', 'balanceController@store')->name('balance.store');
	Route::post('/searchCoowner', 'balanceController@searchCoowner');
});


	Route::get('/index', 'expenditureController@index')->name('mon-expenditure.index');
	Route::get('/create', 'expenditureController@create')->name('mon-expenditure.create');
	Route::get('/editExpenditure/{id}', 'expenditureController@edit')->name('mon-expenditure.edit');
	Route::post('/updateExpenditure', 'expenditureController@update')->name('mon-expenditure.update');
	Route::get('/show/{id}', 'expenditureController@show');
	Route::get('/detailExpenses/{id}', 'expenditureController@findGeneral')->name('mon-expenditure.detail');
	Route::post('/store', 'expenditureController@store')->name('mon-expenditure.store');
	Route::put('/deleted','expenditureController@destroy')->name('mon-expenditure.deleted');
	Route::post('/searchClient', 'expenditureController@searchClient');
	Route::post('/searchMonth', 'expenditureController@searchMonth');
	Route::post('/searchYear','expenditureController@searchYear');
	Route::post('/searchResidence','expenditureController@searchResidence')->name('mon-expenditure.residence');



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

Route::group(['prefix' => 'co-owner'], function () {

	Route::get('/index', 'coownerController@index')->name('co-owner.index');
	Route::get('/create', 'coownerController@create')->name('co-owner.create');
	Route::get('/detail/{id}', 'coownerController@detail')->name('co-owner.detail');
	Route::get('/edit/{id}', 'coownerController@edit')->name('co-owner.edit');
	Route::post('/store', 'coownerController@store')->name('co-owner.store');
	Route::put('/deleted','coownerController@destroy')->name('co-owner.deleted');
	Route::Get('nameResidence/{id}', 'coownerController@nameResidence')->name('nameResidence');
	Route::Get('typeStructure/{id}', 'coownerController@typeStructure')->name('typeStructure');
});

Route::group(['prefix' => 'residence'], function () {

	Route::get('/index', 'residenceController@index')->name('residence.index');
	Route::get('/create', 'residenceController@create')->name('residence.create');
	Route::get('/edit/{id}', 'residenceController@edit')->name('residence.edit');
	Route::get('/detail/{id}', 'residenceController@detail')->name('residence.detail');
	Route::post('store', 'residenceController@store')->name('residence.store');
	Route::put('/deleted','residenceController@destroy')->name('residence.deleted');

});


Auth::routes();