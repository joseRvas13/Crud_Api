<?php

use App\Http\Controllers\Api\productosController;

Route::get('/productos', [productosController::class, 'index']);
Route::get('/productos/{id}', [productosController::class, 'show']);
Route::post('/productos', [productosController::class, 'store']);
Route::put('/productos/{id}', [productosController::class, 'update']);
Route::delete('/productos/{id}', [productosController::class, 'destroy']);
