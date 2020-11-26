<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::resource('personas', App\Http\Controllers\API\PersonasAPIController::class);

Route::resource('marcas', App\Http\Controllers\API\MarcaAPIController::class);

Route::resource('rol_usuarios', App\Http\Controllers\API\rol_usuarioAPIController::class);

Route::resource('tipo_identificacions', App\Http\Controllers\API\tipo_identificacionAPIController::class);

Route::resource('estado_servicios', App\Http\Controllers\API\estado_serviciosAPIController::class);

Route::resource('estado_personas', App\Http\Controllers\API\estado_personaAPIController::class);

Route::resource('tipo_de_servicios', App\Http\Controllers\API\tipo_de_servicioAPIController::class);

Route::resource('estado_facturas', App\Http\Controllers\API\estado_facturaAPIController::class);

Route::resource('tipo_personas', App\Http\Controllers\API\tipo_personaAPIController::class);