<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'UserController@crear')->name('user.create');

Route::get("{idUser}", 'UserController@editar')->name('user.edit');

Route::post("procesar", 'UserController@store')->name('user.store');

Route::put("procesar/{persona}", 'UserController@update')->name('user.update');

Route::delete("{id}", 'UserController@delete')->name("user.delete");