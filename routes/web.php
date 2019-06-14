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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('producten', 'ProductController');
Route::resource('beoordelingen', 'BeoordelingController');

// Beheerderspaneel
Route::get('/admin', 'AdminController@actions')->name('admin.actions')->middleware('admin');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('admin.edit')->middleware('admin');
Route::post('/product/edit/{id}', 'ProductController@update')->name('admin.update')->middleware('admin');
