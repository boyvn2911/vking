<?php

Route::get('/', 'HomeController@index');
Route::get('brand/{slug}/{id}', 'HomeController@listBrand');
Route::get('category/{slug}/{id}', 'HomeController@listCategory');
Route::get('brand-more/{slug}/{id}', 'HomeController@listBrand');
Route::get('detail/{slug}/{id}', 'HomeController@detail');
Route::get('category-more/{slug}/{id}', 'HomeController@listCategory');

Route::get('new', 'HomeController@getNew');
Route::get('hot', 'HomeController@getHot');
Route::get('sale', 'HomeController@getSale');

Route::get('new-list', 'HomeController@getNewList');
Route::get('hot-list', 'HomeController@getHotList');
Route::get('sale-list', 'HomeController@getSaleList');


Auth::routes();

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
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

    Route::get('size', 'CategoryController@size');

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('add', 'ProductController@create');
        Route::post('add', 'ProductController@store');
        Route::get('edit/{id}', 'ProductController@edit');
        Route::post('edit/{id}', 'ProductController@update');
        Route::get('delete/{id}', 'ProductController@destroy');
        Route::post('search', 'ProductController@search');

        Route::get('{id}', 'ProductController@show');
        Route::post('updateStatus/{id}', 'ProductController@updateStatus');
        Route::get('deleteImage/{id}/{key}', 'ProductController@deleteImage');
        Route::get('makeAva/{id}/{key}', 'ProductController@makeAva');
        Route::get('filterBrand/{id}', 'ProductController@filterBrand');
    });

});

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('size', 'AjaxController@size');
});


Auth::routes();
