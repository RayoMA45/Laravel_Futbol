<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hola', function () {
    return 'Es un hola desde Laravel con api';
});

Route::apiResource('estadios', EstadioController::class);
