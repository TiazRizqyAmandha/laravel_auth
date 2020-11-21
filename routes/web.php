<?php
 
use Illuminate\Support\Facades\Route; 
 
Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');
 
});

Route::get('/posts','PostsController@index');
Route::post('/posts/create','PostsController@create');
Route::get('/posts/{id}/edit','PostsController@edit');
Route::post('/posts/{id}/update','PostsController@update');
Route::get('/posts/{id}/delete','PostsController@delete');