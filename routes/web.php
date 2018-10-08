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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/category', 'Admin\CategoryController@index');
Route::get('/admin/category/create', 'Admin\CategoryController@create');
Route::post('/admin/category/store', 'Admin\CategoryController@store');
Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@show');
Route::post('/admin/category/update/{id}', 'Admin\CategoryController@update');
Route::get('/admin/category/destroy/{id}', 'Admin\CategoryController@destroy');

Route::get('/admin/tags', 'Admin\TagController@index');
Route::get('/admin/tags/create', 'Admin\TagController@create');
Route::post('/admin/tags/store', 'Admin\TagController@store');
Route::get('/admin/tags/edit/{id}', 'Admin\TagController@show');
Route::post('/admin/tags/update/{id}', 'Admin\TagController@update');
Route::get('/admin/tags/destroy/{id}', 'Admin\TagController@destroy');