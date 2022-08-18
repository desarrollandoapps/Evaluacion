<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AdminController;

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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('ideas', IdeaController::class)->middleware(['auth']);

Route::get('usuarios', [AdminController::class, 'verUsuarios'])->name('verUsuarios')->middleware(['auth']);
Route::get('usuarios/{id}', [AdminController::class, 'verUsuario'])->name('usuarios.show')->middleware(['auth']);
Route::get('usuarios/{id}/edit', [AdminController::class, 'editUsuario'])->name('usuarios.edit')->middleware(['auth']);
Route::put('usuarios/{id}', [AdminController::class, 'updateUsuario'])->name('usuarios.update')->middleware(['auth']);
