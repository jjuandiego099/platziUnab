<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\InscripcionesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//rutas categorias 
//solo vistas para el admin
Route::prefix('categorias')->middleware(['permission:categorias'])->group(function () {
    Route::get('/', [CategoriasController::class, 'index'])->name('categorias.table');
    Route::get('/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/store', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::delete('/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
});

Route::get('/home', [CursosController::class, 'cursos'])->name('home');
Route::get('home/categorias/{id}', [CursosController::class, 'filterByCategory'])->name('filtro.categorias');

Route::get('/cursos/{id}', [CursosController::class, 'index'])->name('categorias.index');


// Route::post('/cursos/{id}/inscribirse', [InscripcionesController::class, 'store'])->middleware('auth')->name('inscribirse');
