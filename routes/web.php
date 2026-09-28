<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\logincontroller;

Route::get('/','App\Http\Controllers\LoginController@index');
Route::post('/login','App\Http\Controllers\LoginController@aksilogin');

Route::get('/home','App\Http\Controllers\LoginController@home');
Route::get('/logout','App\Http\Controllers\LoginController@logout');

Route::get('/inputdata','App\Http\Controllers\logincontroller@data');
Route::post('/input','App\Http\Controllers\logincontroller@form');