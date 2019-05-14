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

Route::resource('perfil', 'PerfilController');

Route::resource('postagem', 'PostagemController');

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/perfil/{id}', 'PerfilController@show')->name('perfil.show');

//Route::post('/perfil/store', 'PerfilController@store')->name('perfil.store');

//Route::get('/perfil/create/{id}', 'PerfilController@create')->name('perfil.create');

//Route::get('/perfil/criar/{id}', 'PerfilController@create')->name('perfil.create');

//Route::get('/perfil/criar/{id}', 'PerfilController@create')->name('perfil.create');
