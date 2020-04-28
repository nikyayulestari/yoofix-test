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

Route::get('/','signupController@index');

Route::post('/signup','signupController@create')->name('/signup');


Route::get('/service','serviceController@index');

Route::post('/service/create','serviceController@create')->name('/service/create');

Route::post('/service/{IDService}/update','serviceController@update');

Route::get('/service/{IDService}/delete','serviceController@delete');


Route::get('/fixer','fixerController@index');

Route::post('/fixer/create','fixerController@create')->name('/fixer/create');