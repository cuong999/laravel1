<?php

Route::group(['namespace' => 'Bytesoft\Review\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'reviews'], function () {

            Route::get('/', [
                'as' => 'review.list',
                'uses' => 'ReviewController@getList',
            ]);

            Route::get('/create', [
                'as' => 'review.create',
                'uses' => 'ReviewController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'review.create',
                'uses' => 'ReviewController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'review.edit',
                'uses' => 'ReviewController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'review.edit',
                'uses' => 'ReviewController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'review.delete',
                'uses' => 'ReviewController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'review.delete.many',
                'uses' => 'ReviewController@postDeleteMany',
                'permission' => 'review.delete',
            ]);
        });
    });
    
});