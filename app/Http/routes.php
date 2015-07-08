<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::pattern('id','[0-9]+');
Route::group(['prefix' => 'admin'], function()
{
	Route::group(['prefix' => 'categories'], function()
	{
		Route::get('list', 'AdminCategoriesController@index');
		Route::get('delete/{id?}', 'AdminCategoriesController@destroy');
		Route::get('update/{id?}', 'AdminCategoriesController@update');
		Route::get('edit/{id?}', 'AdminCategoriesController@edit');
		Route::get('store', 'AdminCategoriesController@store');
	});	
	Route::group(['prefix' => 'products'], function()
	{
		Route::get('list', 'AdminProductsController@index');
		Route::get('delete/{id?}', 'AdminProductsController@destroy');
		Route::get('update/{id?}', 'AdminProductsController@update');
		Route::get('edit/{id?}', 'AdminProductsController@edit');
		Route::get('store', 'AdminProductsController@store');
	});	
});

Route::get('/', function () {
    return view('welcome');
});
