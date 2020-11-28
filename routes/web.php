<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
Route::get('/key-user', 'AuthController@halamanKeyUser')->name('key-user');
Route::post('/key-user', 'AuthController@keyUser');
//! new register
Route::post('register-user', 'AuthController@register');



Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'HomeController@index')->name('profile');
    Route::get('/beranda/{kategori?}/{generation?}/{username?}/{created_at?}/{gender?}', 'BerandaController@index')->name('beranda');
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
Route::get('/kategori/{id}/delete', 'PostsCategoryController@delete');
//! Anggota
Route::get('/admin/anggota', 'AnggotaController@anggotaIndex');
Route::get('/user/anggota', 'AnggotaController@anggotaIndex');
Route::post('/anggota/create', 'AnggotaController@create');
Route::get('/anggota/{id}/edit', 'AnggotaController@edit');
Route::post('/anggota/{id}/update', 'AnggotaController@update');
Route::get('/anggota/{id}/delete', 'AnggotaController@delete');
Route::get('/anggota/{id}/read', 'AnggotaController@read');
//! Reset Password
Route::post('/anggota/reset-password', 'AnggotaController@resetPassword');
//! Kirim Email
Route::get('/admin/kirim-email', 'EmailController@index');
Route::get('/user/kirim-email', 'EmailController@index');
//! Profile
Route::get('/home/{id}/edit', 'HomeController@edit');
Route::post('/home/{id}/update', 'HomeController@update');
Route::get('/home/{id}/editpassword', 'HomeController@editpassword');
Route::post('/home/{id}/updatepassword', 'HomeController@updatepassword');
//! Works
Route::get('/admin/works', 'WorksController@index');
Route::get('/user/works', 'WorksController@index');
Route::post('/works/create', 'WorksController@create');
Route::get('/works/{id}/edit', 'WorksController@edit');
Route::post('/works/{id}/update', 'WorksController@update');
Route::get('/works/{id}/delete', 'WorksController@delete');