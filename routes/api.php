<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ArbitrosController;
use App\Http\Controllers\EstadisticasEquipoController;
use App\Http\Controllers\EstadisticasJugadorController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoJugadoController;
use App\Http\Controllers\TemporadasController;

Route::apiResource('equipos', EquipoController::class);

Route::apiResource('estadios', EstadioController::class);

Route::apiResource('jugadores', JugadorController::class);

Route::apiResource('estadisticasJugador', EstadisticasJugadorController::class);

Route::apiResource('estadisticasEquipo', EstadisticasEquipoController::class);

Route::apiResource('temporadas', TemporadasController::class);

Route::apiResource('arbitros', ArbitrosController::class);

Route::apiResource('partidos', PartidoJugadoController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hola', function () {
    return 'Es un hola desde Laravel con api';
});