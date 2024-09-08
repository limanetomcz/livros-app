<?php

use App\Http\Controllers\AssuntoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');
Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');
Route::get('/livros/{id}/edit', [LivroController::class, 'edit'])->name('livros.edit');
Route::put('/livros/{id}', [LivroController::class, 'update'])->name('livros.update');
Route::delete('/livros/{id}', [LivroController::class, 'destroy'])->name('livros.destroy');

Route::get('/autores', [AutorController::class, 'index'])->name('autores.index');
Route::post('/autores', [AutorController::class, 'store'])->name('autores.store');
Route::get('/autores/{id}/edit', [AutorController::class, 'edit'])->name('autores.edit');
Route::put('/autores/{id}', [AutorController::class, 'update'])->name('autores.update');
Route::delete('/autores/{id}', [AutorController::class, 'destroy'])->name('autores.destroy');

Route::get('/assuntos', [AssuntoController::class, 'index'])->name('assuntos.index');
Route::post('/assuntos', [AssuntoController::class, 'store'])->name('assuntos.store');
Route::get('/assuntos/{id}/edit', [AssuntoController::class, 'edit'])->name('assuntos.edit');
Route::put('/assuntos/{id}', [AssuntoController::class, 'update'])->name('assuntos.update');
Route::delete('/assuntos/{id}', [AssuntoController::class, 'destroy'])->name('assuntos.destroy');

Route::get('/relatorio', [ReportController::class, 'generateReport']);
Route::get('/compile-relatorio', [ReportController::class, 'compileReport']);