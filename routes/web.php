<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('page.home');
Route::get('login-register', 'AuthController@showFormLogin')->name('auth.showFormLogin');
Route::post('login', 'AuthController@login')->name('auth.login');
Route::post('register', 'AuthController@register')->name('auth.register');

Route::middleware('auth')->group(function (){
    Route::get('submit-house', 'HouseController@create')->name('house.create');
    Route::get('logout', 'AuthController@logout')->name('auth.logout');
    Route::get('contact', 'HomeController@contact')->name('home.contact');

    Route::prefix('houses')->group(function (){
        Route::get('/{id}/file_upload', 'HouseController@uploadFile')->name('house.upload_file');
        Route::post('/{id}/file_upload', 'HouseController@upload')->name('house.upload');
        Route::post('/store', 'HouseController@store')->name('house.store');
        Route::get('/{id}/delete','HouseController@delete')->name('house.delete');
        Route::get('/search','HouseController@search')->name('house.search');
        Route::get('/{id}/detail','HouseController@detail')->name('house.detail');
        Route::get('/{id}/edit','HouseController@edit')->name('house.edit');
        Route::post('/{id}/edit','HouseController@update')->name('house.update');
        Route::get('/{id}/images','HouseController@getImageIntoHouse')->name('house.getImageIntoHouse');
        Route::get('/','HouseController@index')->name('house.index');
    });

    Route::prefix('me')->group(function (){
        Route::get('my-house','UserController@getMyHouse')->name('user.getMyHouse');
        Route::get('my-profile','UserController@getMyProfile')->name('user.getMyProfile');
        Route::post('my-profile','UserController@updateProfile')->name('user.updateProfile');
    });
});
