<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.index');

/**
 * Announcements
 */
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::patch('posts/{post}', 'PostController@update')->name('posts.update');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');

/**
 * user
 */
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
Route::patch('/users/{user}/update', 'UserController@update')->name('user.profile.update');
Route::delete('/users/{user}', 'UserController@destroy')->name('user.destroy');

/**
 * route authorization
 */
Route::middleware(['role:admin', 'auth'])->group(function(){
    Route::get('/users', 'UserController@index')->name('users.index');

    Route::patch('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    Route::patch('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');

});

/**
 * admin & model owner same access
 */
Route::middleware(['auth', 'can:view,user'])->group(function(){
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});


/**
 * Roles
 */
Route::get('/roles', 'RoleController@index')->name('roles.index');
Route::post('/roles', 'RoleController@store')->name('role.store');
Route::get('/roles/{role}/edit', 'RoleController@Edit')->name('role.edit');
Route::patch('/roles/{role}', 'RoleController@update')->name('role.update');
Route::delete('/roles/{role}', 'RoleController@destroy')->name('role.destroy');

/**
 * Permissions
 */
Route::get('/permissions', 'PermissionController@index')->name('permissions.index');