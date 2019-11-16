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



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//user admin routes
Route::get('/admin/users', 'AdminsUsersController@index'); //all users
Route::get('/admin/users/{user}', 'AdminsUsersController@show'); //show 1 user
Route::get('/admin/users/{user}/edit', 'AdminsUsersController@edit'); //edit a user
Route::patch('/admin/users/{user}', 'AdminsUsersController@update'); //confirm and update with edit
Route::delete('admin/users/{user}', 'AdminsUsersController@destroy'); //(soft) delete user

//user theme routes
Route::get('/admin/themes', 'AdminsThemesController@index'); //all themes
Route::get('/admin/themes/create', 'AdminsThemesController@create');        //create new theme from form *needs to happen before show method
Route::post('/admin/themes', 'AdminsThemesController@store');               //store the theme in DB
Route::get('/admin/themes/{theme}', 'AdminsThemesController@show'); //show 1 theme
Route::get('/admin/themes/{theme}/edit', 'AdminsThemesController@edit'); //edit a theme
Route::patch('/admin/themes/{theme}', 'AdminsThemesController@update'); //confirm and update with edit
Route::delete('admin/themes/{theme}', 'AdminsThemesController@destroy'); //delete theme

//posts and main pages routes?
Route::get('/', 'PostsController@index');
