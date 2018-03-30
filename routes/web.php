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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){

    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');


    Route::resource('providers', 'ProvidersController');
    Route::resource('/products', 'ProductsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/manager-providers', 'MprovidersController');


    Route::get('/providers-export', 'ProvidersController@export')->name('provider.export');
    Route::post('/providers-import', 'ProvidersController@import')->name('provider.import');

//    Route::get('/import-export', 'ExcelprovidersController@export');
//    Route::post('/import-export', 'ExcelprovidersController@import');
//    Route::get('/import-export', 'ExcelprovidersController@index');

    Route::post('/del', 'ProvidersController@del')->name('provider.del');
});
