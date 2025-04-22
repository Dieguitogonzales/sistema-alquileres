<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\TrajeController;
use App\Http\Controllers\HomeController; // Asegúrate de que esta línea exista

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

Route::middleware(['auth', /* Aquí puedes agregar tu middleware de administrador si lo tienes */])->prefix('admin')->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('trajes', TrajeController::class);
});