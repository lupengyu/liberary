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

Route::get('/', 'IndexController@index')->name('index');
Route::post('/register', 'IndexController@register')->name('register');
Route::get('/logout', 'IndexController@logout')->name('index');
Route::post('/login', 'IndexController@login')->name('login');

Route::get('/backstage', 'BackstageController@index')->name('backstage');
Route::get('/backstage/addbook', 'BackstageController@addbook')->name('addbook');
Route::post('/backstage/addbookinformation', 'BackstageController@addbookinformation')->name('addbookinformation');
Route::post('/backstage/searchbook', 'BackstageController@searchbook')->name('searchbook');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/searchbook', 'HomeController@searchbook')->name('searchbook');