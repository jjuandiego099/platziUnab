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
Route::get('/categorias', [CategoriasController::class, 'create'])->name('categorias.name');

