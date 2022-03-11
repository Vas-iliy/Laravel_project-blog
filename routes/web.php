<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
   Route::get('/', 'MainController@index')->name('admin.index');
   Route::resource('/categories', 'CategoryController');
   Route::resource('/tags', 'TagController');
   Route::resource('/posts', 'PostController');
});

Route::get('/register', 'UserController@register')->name('register.create');
Route::post('/register', 'UserController@store')->name('register.store');
