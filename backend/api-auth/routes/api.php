<?php

use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\PalomitaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('peliculas', PeliculaController::class);
Route::apiResource('directores', DirectorController::class);
Route::apiResource('facturas', FacturaController::class);
Route::apiResource('horarios', HorarioController::class);
Route::apiResource('miembros', MiembroController::class);
Route::apiResource('notificaciones', NotificacionController::class);
Route::apiResource('palomitas', PalomitaController::class);
Route::apiResource('reservas', ReservaController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('salas', SalaController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('ventas', VentaController::class);
