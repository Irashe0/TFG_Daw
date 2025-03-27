<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\CineController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\VentaController;

// Rutas públicas
Route::post('/registro', [AuthController::class, 'registro']); // Registro público
Route::post('/login', [AuthController::class, 'login']); // Login público

Route::get('/peliculas', [PeliculaController::class, 'index']); // Ruta pública para ver películas
Route::get('/cines', [CineController::class, 'index']); // Ruta pública para ver cines
Route::get('/horarios', [HorarioController::class, 'index']); // Ruta pública para ver horarios
Route::get('/directores', [DirectorController::class, 'index']); // Ruta pública para ver directores

// Rutas protegidas
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']); // Ruta de logout

    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('usuarios', UsuarioController::class);
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('facturas', FacturaController::class);
        Route::apiResource('ventas', VentaController::class);
    });

    // Rutas de compras y reservas que requieren autenticación
    Route::post('reservas', [ReservaController::class, 'store']); // Crear reserva
    Route::post('comprar', [VentaController::class, 'store']); // Comprar entradas
});