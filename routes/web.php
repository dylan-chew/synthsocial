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
Route::get('/admin/users', 'AdminsUsersController@index')->name('users'); //all users
Route::post('/admin/users/search', 'AdminsUsersController@search'); //search through users
Route::get('/admin/users/{user}', 'AdminsUsersController@show'); //show 1 user
Route::get('/admin/users/{user}/edit', 'AdminsUsersController@edit'); //edit a user
Route::patch('/admin/users/{user}', 'AdminsUsersController@update'); //confirm and update with edit
Route::delete('admin/users/{user}', 'AdminsUsersController@destroy'); //(soft) delete user

//user theme routes
Route::get('/admin/themes', 'AdminsThemesController@index')->name('themes'); //all themes
Route::get('/admin/themes/create', 'AdminsThemesController@create');        //create new theme from form *needs to happen before show method
Route::post('/admin/themes', 'AdminsThemesController@store');               //store the theme in DB
Route::get('/admin/themes/{theme}', 'AdminsThemesController@show'); //show 1 theme
Route::get('/admin/themes/{theme}/edit', 'AdminsThemesController@edit'); //edit a theme
Route::patch('/admin/themes/{theme}', 'AdminsThemesController@update'); //confirm and update with edit
Route::post('/admin/themes/{theme}', 'AdminsThemesController@setDefault'); //to handle making default theme
Route::delete('admin/themes/{theme}', 'AdminsThemesController@destroy'); //delete theme

//posts and main pages routes?
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/', function (){
    return redirect('/');
});
Route::get('posts/create', 'PostsController@create')->name('create.post')->middleware('auth');
Route::get('posts/favorites', 'PostsController@showFavorites')->name('favorites');            //Handle user favorite posts
Route::post('/posts/', 'PostsController@store');                           //store the post in DB
Route::delete('/posts/delete/{post}', 'PostsController@destroy');          //delete the post


//Handle user setting theme, setting cookie
Route::post('/set-theme', 'UsersThemesController@set')->name('set.theme');
