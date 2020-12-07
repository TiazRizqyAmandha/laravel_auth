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
//! email key
Route::get('/email-key','AuthController@halamanEmailUser')->name('email-key');
Route::post('/email-key','AuthController@keyEmail');
//! forgot password
Route::get('/forgot_password','AuthController@forgot');
Route::post('/forgot_password','AuthController@password');
//! new password
Route::get('/changepassword/{username}/{userkey}','AuthController@viewchange');
Route::post('/new_password', 'AuthController@new_pass')->name('new_password');


Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'HomeController@index')->name('profile');
    Route::get('/beranda/{kategori?}/{generation?}/{username?}/{created_at?}/{gender?}', 'BerandaController@index')->name('beranda');
    //! view beranda
    Route::get('/beranda2/{posts}/view', 'BerandaController@view');
    //! komentar beranda
    Route::post('/beranda2/{posts}/view', 'BerandaController@postKomentar');
    Route::get('/anggota/{id}/read', 'AnggotaController@read');
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
//! Export Excel
Route::get('/posts/export','PostsController@export');
//! Export PDF
Route::get('/posts/exportpdf','PostsController@exportPDF');


//! Posts Category
Route::get('/admin/kategori', 'PostsCategoryController@halamanIndex');
Route::post('/kategori/create', 'PostsCategoryController@create');
Route::get('/kategori/{id}/edit', 'PostsCategoryController@edit');
Route::post('/kategori/{id}/update', 'PostsCategoryController@update');
Route::get('/kategori/{id}/delete', 'PostsCategoryController@delete');
//! Export Excel
Route::get('/kategori/export','PostsCategoryController@export');
//! Export PDF
Route::get('/kategori/exportpdf','PostsCategoryController@exportPDF');


//! Anggota
Route::get('/admin/anggota', 'AnggotaController@anggotaIndex');
Route::get('/user/anggota', 'AnggotaController@anggotaIndex');
Route::post('/anggota/create', 'AnggotaController@create');
Route::get('/anggota/{id}/edit', 'AnggotaController@edit');
Route::post('/anggota/{id}/update', 'AnggotaController@update');
Route::get('/anggota/{id}/delete', 'AnggotaController@delete');
Route::get('/anggota/{id}/read', 'AnggotaController@read');
//! Export Excel
Route::get('/anggota/export','AnggotaController@export');
//! Export PDF
Route::get('/anggota/exportpdf','AnggotaController@exportPDF');
//! Reset Password
Route::post('/anggota/reset-password', 'AnggotaController@resetPassword');
//! Kirim Email
Route::get('/kirim-email', 'EmailController@index');


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
//! Export Excel
Route::get('/works/export','WorksController@export');
//! Export PDF
Route::get('/works/exportpdf','WorksController@exportPDF');
