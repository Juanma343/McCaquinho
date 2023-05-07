<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', 'App\Http\Controllers\loginController@logout')->name('logout');
Route::get('/sesion', 'App\Http\Controllers\loginController@verSesion')->name('sesion');
Route::post( '/login', 'App\Http\Controllers\loginController@login' )->name('login');
Route::get('/login', 'App\Http\Controllers\loginController@loginview')->name('loginview');
Route::post('/registro', 'App\Http\Controllers\loginController@registro')->name('registro');
Route::get('/registro', 'App\Http\Controllers\loginController@registroview')->name('registroview');


