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
	Route::get('/json-form','ItemController@jsonForm');
	Route::get('/new','ItemController@getCatSat');
	Route::post('/save','ItemController@saveData');
	Route::post('/update','ItemController@update');
	Route::get('/action/{id}/{type}','ItemController@action');
	Route::post('/delete','ItemController@delete');

});


//Route Untuk Customer
Route::group(['prefix' => 'customer'], function(){
	Route::get('/','CustomerController@index');
	Route::get('/json','CustomerController@json');
	Route::get('/json-form','CustomerController@jsonForm');
	Route::get('/new','CustomerController@getProvinsi');	
	Route::get('/getkab/{id}','CustomerController@getKabupaten');
	Route::post('/save','CustomerController@saveData');
	Route::get('/action/{id}/{type}','CustomerController@action');
	Route::post('/update','CustomerController@update');	
	Route::post('/delete','CustomerController@delete');	
});

//Route untuk Category
Route::group(['prefix' => 'category'], function(){
	Route::get('/','Category_productController@index');
	Route::get('/new','Category_productController@new');
	Route::get('/json','Category_productController@json');
	Route::get('/json-form','Category_productController@jsonForm');
	Route::post('/save','Category_productController@saveData');
	Route::get('/action/{id}/{type}','Category_productController@action');
	Route::post('/update','Category_productController@update');	
	Route::post('/delete','Category_productController@delete');	
});


//Route untuk Satuan
Route::group(['prefix' => 'satuan'], function(){
	Route::get('/','SatuanController@index');
	Route::get('/new','SatuanController@new');
	Route::get('/json','SatuanController@json');
	Route::get('/json-form','SatuanController@jsonForm');
	Route::post('/save','SatuanController@saveData');
	Route::get('/action/{id}/{type}','SatuanController@action');
	Route::post('/update','SatuanController@update');	
	Route::post('/delete','SatuanController@delete');	
});

//Masuk
Route::group(['prefix' => 'masuk'], function(){
	Route::get('/','Item_masukController@getItem');
	Route::post('/save','Item_masukController@saveData');
});

//keluar
Route::group(['prefix' => 'keluar'], function(){
	Route::get('/','Item_keluarController@index');
	Route::get('/json','Item_keluarController@json');
	Route::get('/save/{id}','Item_keluarController@save');
	Route::post('/savedata','Item_keluarController@saveData');
});

//form SPK
Route::group(['prefix' => 'spk'], function(){
	Route::get('/',function(){
		return view('formSpk');
	});
	Route::post('/proses','SpkController@proses');
	Route::get('/json','SpkController@json');
});

//Stock
Route::get('/', function(){
	return view('stock');
});





