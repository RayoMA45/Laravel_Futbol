<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\EquipoController;

Route::apiResource('equipos', EquipoController::class);

Route::apiResource('estadios', EstadioController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hola', function () {
    return 'Es un hola desde Laravel con api';
});