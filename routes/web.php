<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Rutas de Carta
Route::get('/', 'App\Http\Controllers\PlatoController@index')->name('platos');
Route::post('/plato/sesion', 'App\Http\Controllers\PlatoController@guardarEnSesion')->name('guardar_en_sesion');
Route::put('/plato', 'App\Http\Controllers\PlatoController@eliminarPlato')->name('eliminar_plato');
Route::get('/añadir_plato', 'App\Http\Controllers\PlatoController@añadirPlato')->name('añadirPlato');
Route::post('/añadir_plato', 'App\Http\Controllers\PlatoController@guardarPlato')->name('guardarPlato');

// Rutas de Reserva
Route::get('/consultar_reservas', 'App\Http\Controllers\ReservasController@consultar_reservas')->name('consultar_reservas');
Route::get('/consultar_reservas/{reserva}', 'App\Http\Controllers\ReservasController@mostrar_reserva')->name('mostrar_reserva');
Route::get('/realizar_reserva', 'App\Http\Controllers\ReservasController@realizar_reserva')->name('realizar_reserva');
Route::post('/realizar_reserva', 'App\Http\Controllers\ReservasController@guardar')->name('guardar');

// Rutas de Pedido
Route::get('/pedido', 'App\Http\Controllers\pedidoController@mostrarPlatosPedido')->name('pedido');
Route::post('/pedido', 'App\Http\Controllers\pedidoController@guardar')->name('guardar');
Route::post('/pedido/sumar', 'App\Http\Controllers\pedidoController@sumarCantidad')->name('sumarCantidad');
Route::post('/pedido/restar', 'App\Http\Controllers\pedidoController@restarCantidad')->name('restarCantidad');

// Rutas de Mobiliario
Route::get('/administrar_mobiliario', 'App\Http\Controllers\MobiliarioController@administrar_mobiliario')->name('administrar_mobiliario');
Route::post('/administrar_mobiliario', 'App\Http\Controllers\MobiliarioController@modificar')->name('modificar');

// Rutas de autenticacion
Route::get('/logout', 'App\Http\Controllers\loginController@logout')->name('logout');
Route::get('/sesion', 'App\Http\Controllers\loginController@verSesion')->name('sesion');
Route::post('/auth/login', 'App\Http\Controllers\loginController@login' )->name('login');
Route::get('/auth/login', 'App\Http\Controllers\loginController@loginview')->name('loginview');
Route::post('/registro', 'App\Http\Controllers\loginController@registro')->name('registro');
Route::get('/registro', 'App\Http\Controllers\loginController@registroview')->name('registroview');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
