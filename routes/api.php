<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productosController;

Route::get('/productos', [ProductosController::class, 'index']);

Route::get('/productos/{id}', function () {
    return "Studnets LIst";
});

Route::post('/productos', function () {
    return "Studnets LIst";
});

Route::put('/productos/{id}', function () {
    return "Studnets LIst";
});


Route::delete('/productos/{id}', function () {
    return "Studnets LIst";
});
