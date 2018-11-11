<?php

Route::group(['namespace' => 'Bytesoft\Product\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'products'], function () {

            Route::get('/', [
                'as' => 'product.list',
                'uses' => 'ProductController@getList',
            ]);

            Route::get('/create', [
                'as' => 'product.create',
                'uses' => 'ProductController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'product.create',
                'uses' => 'ProductController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'product.edit',
                'uses' => 'ProductController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'product.edit',
                'uses' => 'ProductController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'product.delete',
                'uses' => 'ProductController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'product.delete.many',
                'uses' => 'ProductController@postDeleteMany',
                'permission' => 'product.delete',
            ]);
        });

        Route::group(['prefix' => 'product_groups'], function () {

            Route::get('/', [
                'as' => 'product.groups.list',
                'uses' => 'ProductGroupController@getList',
            ]);

            Route::get('/create', [
                'as' => 'product.groups.create',
                'uses' => 'ProductGroupController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'product.groups.create',
                'uses' => 'ProductGroupController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'product.groups.edit',
                'uses' => 'ProductGroupController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'product.groups.edit',
                'uses' => 'ProductGroupController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'product.groups.delete',
                'uses' => 'ProductGroupController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'product.groups.delete.many',
                'uses' => 'ProductGroupController@postDeleteMany',
                'permission' => 'product_groups.delete',
            ]);
        });

    });
    
});