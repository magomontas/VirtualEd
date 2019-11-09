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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'ClasesController@index')->name('clases');
Route::get('/clases/lista/{id}', 'ClasesController@listar')->name('lista');
Route::get('/usuarios/profile', 'UsuarioController@profile')->name('profile');
Route::get('/usuarios/guardar', 'UsuarioController@guardar')->name('guardar');

Route::resource('/materias', 'MateriaController');
Route::resource('/usuarios', 'UsuarioController');
Route::resource('/clases', 'ClasesController');
Route::resource('/tareas', 'TareaController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
