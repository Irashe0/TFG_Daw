<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ProfileController;

// Ruta principal que carga React
Route::get('/{any}', function () {
    return File::get(public_path('dist/index.html'));
})->where('any', '.*');


// Rutas protegidas con autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Cargar las rutas de autenticación
require __DIR__.'/auth.php';
