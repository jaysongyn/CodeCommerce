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
		Route::get('list', ['as' => 'listar', 'uses' => 'AdminCategoriesController@index']);
		Route::put('delete/{id?}',  ['as' => 'excluir', 'uses' => 'AdminCategoriesController@destroy']);
		Route::put('update/{id?}',  ['as' => 'atualizar', 'uses' => 'AdminCategoriesController@update']);
		Route::get('edit/{id?}',  ['as' => 'editar', 'uses' => 'AdminCategoriesController@edit']);
		Route::post('store',  ['as' => 'salvar', 'uses' => 'AdminCategoriesController@store']);
	});	
	Route::group(['prefix' => 'products'], function()
	{
		Route::get('list',  ['as' => 'listar', 'uses' => 'AdminProductsController@index']);
		Route::put('delete/{id?}',  ['as' => 'excluir', 'uses' => 'AdminProductsController@destroy']);
		Route::put('update/{id?}',  ['as' => 'atualizar', 'uses' => 'AdminProductsController@update']);
		Route::get('edit/{id?}',  ['as' => 'editar', 'uses' => 'AdminProductsController@edit']);
		Route::post('store',  ['as' => 'salvar', 'uses' => 'AdminProductsController@store']);
	});	
});

Route::get('/', function () {
    return view('welcome');
});
