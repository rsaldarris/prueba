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

Route::group(['middleware' => 'language'], function () {

Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/index', 'HomeController@index')->name("home.index");
Route::get('/home', 'HomeController@index')->name('home.index');
Auth::routes();

Route::get('/language/{lang}', 'LanguageController@setLanguage')->name("language.setLanguage");

Route::get('/automovil/show', 'AutomovilController@show')->name("automovil.show");
Route::get('/automovil/create', 'AutomovilController@create')->name("automovil.create");
Route::post('/automovil/save', 'AutomovilController@save')->name("automovil.save");
Route::get('/automovil/showpost/{id}', 'AutomovilController@showpost')->name("automovil.showpost");
Route::post('/automovil/delete/{id}', 'AutomovilController@delete')->name("automovil.delete");

Route::get('/allies/index','AlliesController@index')->name("allies.index");
Route::get('/allies/api','AlliesController@api')->name("allies.api");

Route::post('/automovil/edit/{id}', 'AutomovilController@edit')->name("automovil.edit");
Route::post('/automovil/saveEdit', 'AutomovilController@saveEdit')->name("automovil.saveEdit");

});

