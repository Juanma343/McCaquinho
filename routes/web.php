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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas de Reserva
Route::get('/consultar_reservas', 'App\Http\Controllers\ReservasController@consultar_reservas')->name('consultar_reservas');
Route::get('/consultar_reservas/{reserva}', 'App\Http\Controllers\ReservasController@mostrar_reserva')->name('mostrar_reserva');
Route::get('/realizar_reserva', 'App\Http\Controllers\ReservasController@realizar_reserva')->name('realizar_reserva');
Route::post('/realizar_reserva', 'App\Http\Controllers\ReservasController@guardar')->name('guardar');

//Rutas de Mobiliario
Route::get('/administrar_mobiliario', 'App\Http\Controllers\MobiliarioController@administrar_mobiliario')->name('administrar_mobiliario_con_exito');
Route::post('/administrar_mobiliario', 'App\Http\Controllers\MobiliarioController@modificar')->name('modificar');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
