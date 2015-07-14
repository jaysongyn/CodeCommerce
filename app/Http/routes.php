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
Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']],  function()
{
	Route::group(['prefix' => 'categories'], function()
	{
		Route::get('', ['as' => 'categories.index', 'uses' => 'AdminCategoriesController@index']);
		Route::get('{id}/destroy',  ['as' => 'categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
		Route::put('{id}/update',  ['as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);
		Route::get('{id}/edit',  ['as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
		Route::post('',  ['as' => 'categories.store', 'uses' => 'AdminCategoriesController@store']);
		Route::get('create',  ['as' => 'categories.create', 'uses' => 'AdminCategoriesController@create']);
	});	
	Route::group(['prefix' => 'products'], function()
	{
		Route::get('',  ['as' => 'products.index', 'uses' => 'AdminProductsController@index']);
		Route::get('{id}/destroy',  ['as' => 'products.destroy', 'uses' => 'AdminProductsController@destroy']);
		Route::put('{id}/update',  ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);
		Route::get('{id}/edit',  ['as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
		Route::post('',  ['as' => 'products.store', 'uses' => 'AdminProductsController@store']);
		Route::get('create',  ['as' => 'products.create', 'uses' => 'AdminProductsController@create']);
	});		
});

Route::get('/', function () {
    return view('welcome');
});
