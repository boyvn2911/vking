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

Route::get('/', 'HomeController@index');


Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');

    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', 'BrandController@index');

        Route::get('add', 'BrandController@create');
        Route::post('add', 'BrandController@store');

        Route::get('edit/{id}', 'BrandController@edit');
        Route::post('edit/{id}', 'BrandController@update');

        Route::get('delete/{id}', 'BrandController@destroy');

        Route::get('{id}', 'BrandController@show');

        Route::post('updateStatus/{id}', 'BrandController@updateStatus');
        Route::post('changeName/{id}', 'BrandController@changeName');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index');

        Route::get('add', 'CategoryController@create');
        Route::post('add', 'CategoryController@store');

        Route::get('edit/{id}', 'CategoryController@edit');
        Route::post('edit/{id}', 'CategoryController@update');

        Route::get('delete/{id}', 'CategoryController@destroy');

        Route::get('{id}', 'CategoryController@show');

        Route::post('updateStatus/{id}', 'CategoryController@updateStatus');
        Route::post('changeName/{id}', 'CategoryController@changeName');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index');

        Route::get('add', 'ProductController@create');
        Route::post('add', 'ProductController@store');

        Route::get('edit/{id}', 'ProductController@edit');
        Route::post('edit/{id}', 'ProductController@update');

        Route::get('delete/{id}', 'ProductController@destroy');

        Route::get('{id}', 'ProductController@show');

        Route::post('updateStatus/{id}', 'ProductController@updateStatus');
        Route::get('deleteImage/{id}/{key}', 'ProductController@deleteImage');
        Route::get('makeAva/{id}/{key}', 'ProductController@makeAva');
    });
});