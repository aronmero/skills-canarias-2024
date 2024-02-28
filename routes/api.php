<?php

use App\Http\Controllers\apiEventosController;
use App\Http\Controllers\apiReservasController;
use App\Http\Controllers\apiSalasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::apiResource('salas', apiSalasController::class)->parameters(['salas' => 'sala'])->except(['update', 'store', 'destroy']);
Route::apiResource('eventos', apiEventosController::class)->parameters(['eventos' => 'evento']);
Route::apiResource('reservas', apiReservasController::class)->parameters(['reservas' => 'reserva']);
