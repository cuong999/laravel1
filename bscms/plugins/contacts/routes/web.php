<?php

Route::group(['namespace' => 'Bytesoft\Contacts\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'contacts'], function () {

            Route::get('/', [
                'as' => 'contacts.list',
                'uses' => 'ContactsController@getList',
            ]);

            Route::get('/create', [
                'as' => 'contacts.create',
                'uses' => 'ContactsController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'contacts.create',
                'uses' => 'ContactsController@postCreate',
            ]);


            Route::get('/edit/{id}', [
                'as' => 'contacts.edit',
                'uses' => 'ContactsController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'contacts.edit',
                'uses' => 'ContactsController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'contacts.delete',
                'uses' => 'ContactsController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'contacts.delete.many',
                'uses' => 'ContactsController@postDeleteMany',
                'permission' => 'contacts.delete',
            ]);
            Route::post('/add', [
                'as' => 'contacts.add',
                'uses' => 'ContactsController@addContact',
            ]);
        });
    });
    
});