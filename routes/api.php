<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('regions', \App\Http\Controllers\RegionController::class.'@index');
Route::post('regions', \App\Http\Controllers\RegionController::class.'@store');
Route::delete('regions/{region}', \App\Http\Controllers\RegionController::class.'@destroy');
