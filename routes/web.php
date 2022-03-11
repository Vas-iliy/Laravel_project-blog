<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index')->name('home');
Route::get('/article{slug}', 'PostController@show')->name('posts.article');
Route::get('/category{slug}', 'CategoryController@show')->name('categories.single');

//Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
   Route::get('/', 'MainController@index')->name('admin.index');
   Route::resource('/categories', 'CategoryController');
   Route::resource('/tags', 'TagController');
   Route::resource('/posts', 'PostController');
});

//Auth
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'UserController@register')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});
Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');
