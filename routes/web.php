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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user admin routes
Route::get('/admin/users', 'AdminsUsersController@index');
Route::get('/admin/users/{user}/edit', 'AdminsUsersController@edit');
Route::patch('/admin/users/{user}', 'AdminsUsersController@update');
