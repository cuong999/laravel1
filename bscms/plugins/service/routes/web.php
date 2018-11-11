<?php

Route::group(['namespace' => 'Bytesoft\Service\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'services'], function () {

            Route::get('/', [
                'as' => 'service.list',
                'uses' => 'ServiceController@getList',
            ]);

            Route::get('/create', [
                'as' => 'service.create',
                'uses' => 'ServiceController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'service.create',
                'uses' => 'ServiceController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'service.edit',
                'uses' => 'ServiceController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'service.edit',
                'uses' => 'ServiceController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'service.delete',
                'uses' => 'ServiceController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'service.delete.many',
                'uses' => 'ServiceController@postDeleteMany',
                'permission' => 'service.delete',
            ]);
        });
    });
    
});