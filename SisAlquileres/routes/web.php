<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\TrajeController;
use App\Http\Controllers\Admin\AlquilerDetalleController;
use App\Http\Controllers\Admin\AlquilerController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', ])->prefix('admin')->name('admin.')->group(function () {
    
    Route::resource('clientes', ClienteController::class);
    
    // Gestión de Categorías
    Route::resource('categorias', CategoriaController::class);
    
    // Gestión de Trajes
    Route::resource('trajes', TrajeController::class);
    
    // Gestión de Alquileres
    Route::resource('alquileres', AlquilerController::class);
    
    // Gestión de Detalles de Alquiler
    Route::resource('alquiler-detalles', AlquilerDetalleController::class);// Agrega esta línea
});

