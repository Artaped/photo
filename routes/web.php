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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', 'HomeController@index');


    Route::get('/category', 'CategoryController@index');
    Route::get('/category/create', 'CategoryController@create');
    Route::post('/category/store', 'CategoryController@store');
    Route::get('/category/edit/{id}', 'CategoryController@show');
    Route::post('/category/update/{id}', 'CategoryController@update');
    Route::get('/category/destroy/{id}', 'CategoryController@destroy');

    Route::get('/tags', 'TagController@index');
    Route::get('/tags/create', 'TagController@create');
    Route::post('/tags/store', 'TagController@store');
    Route::get('/tags/edit/{id}', 'TagController@edit');
    Route::post('/tags/update/{id}', 'TagController@update');
    Route::get('/tags/destroy/{id}', 'TagController@destroy');

    Route::get('/photos', 'PhotoController@index');
    Route::get('/photos/create', 'PhotoController@create');
    Route::post('/photos/store', 'PhotoController@store');
    Route::get('/photos/edit/{id}', 'PhotoController@edit');
    Route::post('/photos/update/{id}', 'PhotoController@update');
    Route::get('/photos/destroy/{id}', 'PhotoController@destroy');

    Route::get('/users', 'UserController@index');
    Route::get('/users/create', 'UserController@create');
    Route::post('/users/store', 'UserController@store');
    Route::get('/users/edit/{id}', 'UserController@edit');
    Route::post('/users/update/{id}', 'UserController@update');
    Route::get('/users/destroy/{id}', 'UserController@destroy');

});

//---------------------------------------------------------------
Route::get('/login', 'AuthUserController@loginForm');
Route::post('/login', 'AuthUserController@login');
Route::get('/logout', 'AuthUserController@logout');
Route::post('/registration/store', 'AuthUserController@store');
Route::get('/registration', 'AuthUserController@registration');

//--------------------------------------------------------------
Route::get('/profile/info', 'ProfileController@info');
Route::post('/profile/info', 'ProfileController@updateProfile');

Route::get('/profile/security', 'ProfileController@changePass');
Route::post('/profile/security', 'ProfileController@updatePass');




Route::get('/', 'DashboardController@index');
Route::get('/{title}/{id}', 'DashboardController@show');




