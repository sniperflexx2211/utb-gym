<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/planes', [PageController::class, 'planes'])->name('planes');
Route::get('/inscripcion', [PageController::class, 'inscripcion'])->name('inscripcion');
Route::post('/inscripcion', [PageController::class, 'procesarInscripcion'])->name('inscripcion.procesar');
Route::get('/clases', [PageController::class, 'clases'])->name('clases');