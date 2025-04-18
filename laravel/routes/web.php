<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // Asegúrate de importar el controlador que manejará la modificación

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// **AÑADE ESTA RUTA (o una similar) PARA EL BOTÓN "MODIFICAR"**
Route::get('/modificar-usuario', [UserController::class, 'edit'])->name('tu.ruta.de.modificacion');

// O si necesitas una ruta POST para enviar datos de modificación:
// Route::post('/actualizar-usuario', [UserController::class, 'update'])->name('tu.ruta.de.modificacion');