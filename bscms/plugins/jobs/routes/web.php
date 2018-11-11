<?php

Route::group(['namespace' => 'Bytesoft\Jobs\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'jobs'], function () {

            Route::get('/', [
                'as' => 'jobs.list',
                'uses' => 'JobsController@getList',
            ]);

            Route::get('/create', [
                'as' => 'jobs.create',
                'uses' => 'JobsController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'jobs.create',
                'uses' => 'JobsController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'jobs.edit',
                'uses' => 'JobsController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'jobs.edit',
                'uses' => 'JobsController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'jobs.delete',
                'uses' => 'JobsController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'jobs.delete.many',
                'uses' => 'JobsController@postDeleteMany',
                'permission' => 'jobs.delete',
            ]);


        });
    });

});