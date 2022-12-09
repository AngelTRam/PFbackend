<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViajesController;
use App\Http\Controllers\LugaresController;
use App\Http\Controllers\LugaresViajesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTAS DE LUGARES
Route::get('/lugares',[LugaresController::class,'getAllPlaces']);
Route::get('/lugares/{id}',[LugaresController::class,'getPlaces']);
Route::post('/lugares',[LugaresController::class,'addPlace']);
Route::put('/lugares/{id}',[LugaresController::class,'modifyPlace']);
Route::delete('/lugares/{id}',[LugaresController::class,'deletePlace']);

//RUTAS DE LUGARES-VIAJES
Route::get('/lugaresviajes',[LugaresViajesController::class,'getAllPlacesTravels']);
Route::get('/lugaresviajes/{id}',[LugaresViajesController::class,'getPlacesTravels']);
Route::post('/lugaresviajes',[LugaresViajesController::class,'addPlaceTravel']);
Route::put('/lugaresviajes/{id}',[LugaresViajesController::class,'modifyPlaceTravel']);
Route::delete('/lugaresviajes/{id}',[LugaresViajesController::class,'deletePlaceTravel']);

//RUTAS DE VIAJES
Route::get('/viajes',[ViajesController::class,'getAllTravels']);
Route::get('/viajes/{id}',[ViajesController::class,'getTravel']);
Route::post('/viajes',[ViajesController::class,'addTravel']);
Route::put('/viajes/{id}',[ViajesController::class,'modifyTravel']);
Route::delete('/viajes/{id}',[ViajesController::class,'deleteTravel']);