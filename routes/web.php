<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;

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