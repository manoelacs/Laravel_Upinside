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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/imoveis', 'PropertyController@index')->name('properties.index');
Route::get('/imoveis/criar', 'PropertyController@create')->name('properties.create');
Route::post('/imoveis/store', 'PropertyController@store')->name('properties.store');
Route::get('/imoveis/{url}/editar', 'PropertyController@edit')->name('properties.edit');
Route::put('/imoveis/{url}', 'PropertyController@update')->name('properties.update');
Route::delete('/imoveis/{url}', 'PropertyController@delete')->name('properties.delete');
