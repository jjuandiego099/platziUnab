<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CursosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\CursosController::class, 'cursos'])->name('home');
Route::get('home/categorias/{id}', [CursosController::class, 'filterByCategory'])->name('filtro.categorias');
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.table');
Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
Route::post('/categorias/store', [CategoriasController::class, 'store'])->name('categorias.store');
Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
Route::get('/cursos/{id}', [CursosController::class, 'index'])->name('categorias.index');

