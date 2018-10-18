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
//Route Untuk Item	
Route::group(['prefix' => 'item'], function(){
	Route::get('/','ItemController@index');	
	Route::get('/json','ItemController@json');
	Route::get('/new','ItemController@getCatSat');
	Route::post('/save','ItemController@saveData');

});


//Route Untuk Customer
Route::group(['prefix' => 'customer'], function(){
	
	Route::get('/new','CustomerController@getProvinsi');	
	Route::get('/getkab/{id}','CustomerController@getKabupaten');
	Route::post('/save','CustomerController@saveData');	
});

Route::get('/coba','ItemController@coba');

Route::get('/bpjs','ItemController@bpjs');
