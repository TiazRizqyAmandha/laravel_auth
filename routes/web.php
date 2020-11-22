<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');


Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'HomeController@index')->name('profile');
    Route::get('logout', 'AuthController@logout')->name('logout');
});
//! Posts
Route::get('/admin/posts', 'PostsController@halamanIndex');
Route::get('/user/posts', 'PostsController@halamanIndex');
Route::post('/posts/create', 'PostsController@create');
Route::post('/posts/store', 'PostsController@store');
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::post('/posts/{id}/update', 'PostsController@update');
Route::put('/posts/{id}/update', 'PostsController@store');
Route::get('/posts/{id}/delete', 'PostsController@delete');
//! Posts Category
Route::get('/admin/kategori', 'PostsCategoryController@halamanIndex');
Route::post('/kategori/create', 'PostsCategoryController@create');
Route::get('/kategori/{id}/edit', 'PostsCategoryController@edit');
Route::post('/kategori/{id}/update', 'PostsCategoryController@update');
//! Anggota
Route::get('/admin/anggota', 'AnggotaController@anggotaIndex');
Route::post('/anggota/create', 'AnggotaController@create');
