<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\CineController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FacturaController;

Route::post('/login', [AuthController::class, 'login']);  

Route::get('/peliculas', [PeliculaController::class, 'index']); 
Route::get('/cines', [CineController::class, 'index']); 
Route::get('/horarios', [HorarioController::class, 'index']); 
Route::get('/directores', [DirectorController::class, 'index']); 

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']); 
    
    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('usuarios', UsuarioController::class);
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('facturas', FacturaController::class);
        Route::apiResource('ventas', VentaController::class);
    });

    Route::post('reservas', [ReservaController::class, 'store']); 
    Route::post('comprar', [VentaController::class, 'store']); 
});
