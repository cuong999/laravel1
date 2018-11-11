<?php

Route::group(['namespace' => 'Bytesoft\Slider\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'sliders'], function () {

            Route::get('/', [
                'as' => 'slider.list',
                'uses' => 'SliderController@getList',
            ]);

            Route::get('/create', [
                'as' => 'slider.create',
                'uses' => 'SliderController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'slider.create',
                'uses' => 'SliderController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'slider.edit',
                'uses' => 'SliderController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'slider.edit',
                'uses' => 'SliderController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'slider.delete',
                'uses' => 'SliderController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'slider.delete.many',
                'uses' => 'SliderController@postDeleteMany',
                'permission' => 'slider.delete',
            ]);
        });
    });
    
});