<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\LeccionesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [CursosController::class, 'cursos'])->name('home');
Auth::routes();

//rutas categorias 
//solo vistas para el admin
Route::prefix('categorias')->middleware(['role:admin'])->group(function () {
    Route::get('/', [CategoriasController::class, 'index'])->name('categorias.table');
    Route::get('/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/store', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::delete('/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
});


Route::get('home/categorias/{categoria}', [CursosController::class, 'filterByCategory'])->name('filtro.categorias');
Route::get('cursos/{curso}', [CursosController::class, 'index'])->name('cursos.index');

Route::prefix('cursos')->group(function () {
    Route::delete('/{curso}', [CursosController::class, 'destroy'])->name('cursos.destroy');
    

    Route::get('/', [CursosController::class, 'table'])->name('cursos.table');
    Route::get('/{curso}/lecciones', [CursosController::class, 'lecciones'])->name('cursos.lecciones');

    Route::delete('/{curso}/lecciones/{lecciones}', [LeccionesController::class, 'destroy'])->name('lecciones.destroy');
});



// Route::post('/cursos/{id}/inscribirse', [InscripcionesController::class, 'store'])->middleware('auth')->name('inscribirse');
