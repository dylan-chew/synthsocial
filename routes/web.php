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
Route::get('/admin/users', 'AdminsUsersController@index'); //all users
Route::get('/admin/users/{user}', 'AdminsUsersController@show'); //show 1 user
Route::get('/admin/users/{user}/edit', 'AdminsUsersController@edit'); //edit a user
Route::patch('/admin/users/{user}', 'AdminsUsersController@update'); //confirm and update with edit
Route::delete('admin/users/{user}', 'AdminsUsersController@destroy'); //(soft) delete user
