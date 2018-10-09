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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dangky', function () {
    return view('dangky');
});
// Route::get('/listuser', 'listusercontroller@showlist');
Route::post('addsv', 'createuser@storeus')-> name('addus');
Route::post('/addlogin', 'loginController@postlogin');
Route::get('/login' , 'loginController@checklogin')->name('login');
Route::get('/listuser', 'homeController@getIndex');
Route::get('/logout', 'loginController@logout');
Route::get('/delete/{id}','listusercontroller@deleteuser' )->name('delete');
Route::get('/update/{id}', 'listusercontroller@getinfouser');
Route::post('/updateus/{id}', 'listusercontroller@update')->name('edit');
Route::get('/listup', 'listusercontroller@nameup');
