<?php

Route::group(['namespace' => 'Bytesoft\Svprocess\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'svprocesses'], function () {

            Route::get('/', [
                'as' => 'svprocess.list',
                'uses' => 'SvprocessController@getList',
            ]);

            Route::get('/create', [
                'as' => 'svprocess.create',
                'uses' => 'SvprocessController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'svprocess.create',
                'uses' => 'SvprocessController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'svprocess.edit',
                'uses' => 'SvprocessController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'svprocess.edit',
                'uses' => 'SvprocessController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'svprocess.delete',
                'uses' => 'SvprocessController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'svprocess.delete.many',
                'uses' => 'SvprocessController@postDeleteMany',
                'permission' => 'svprocess.delete',
            ]);
        });
    });
    
});