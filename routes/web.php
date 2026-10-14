<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoblacionController;

/** 
 * Rutas web
 */

Route::get('/', [PoblacionController::class, 'index']); // Pantalla principal

Route::get('/ciudades/{pais_id}', [PoblacionController::class, 'getCiudades']); // Obtener ciudades por país

