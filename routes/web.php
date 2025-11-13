<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\LeccionesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [CursosController::class, 'home'])->name('home');
Auth::routes();

//rutas categorias 
//solo vistas para el admin
Route::prefix('categorias')->middleware(['role:admin'])->group(function () {
    Route::get('/', [CategoriasController::class, 'index'])->name('categorias.table');
    Route::get('/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/store', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::delete('/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
});




Route::prefix('cursos')->group(function () {
    Route::get('/', [CursosController::class, 'table'])->name('cursos.table'); //tiene policy
    Route::get('/create', [CursosController::class, 'create'])->name('cursos.create')->middleware('role:admin|teacher'); 
    Route::post('/store', [CursosController::class, 'store'])->name('cursos.store'); 
    Route::delete('/{curso}', [CursosController::class, 'destroy'])->name('cursos.destroy'); //tiene policy
    Route::get('/{curso}/lecciones', [CursosController::class, 'lecciones'])->name('cursos.lecciones'); //tiene policy
    Route::get('/{curso}/lecciones/create', [LeccionesController::class, 'create'])->name('lecciones.create'); 
    Route::post('/{curso}/lecciones/create', [LeccionesController::class, 'store'])->name('lecciones.store'); 
    Route::delete('/{curso}/lecciones/{lecciones}', [LeccionesController::class, 'destroy'])->name('lecciones.destroy'); 
    Route::post('{curso}/inscribirse', [InscripcionesController::class, 'store'])->middleware('role:student')->name('inscripcion.store');

});
Route::get('cursos/{curso}', [CursosController::class, 'index'])->name('cursos.index');
Route::get('informacion', [InformacionController::class, 'index'])->name('informacion.index');
Route::get('home/categorias/{categoria}', [CursosController::class, 'filterByCategory'])->name('filtro.categorias');


