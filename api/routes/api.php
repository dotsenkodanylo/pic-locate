<?php

use App\Http\Controllers\CameraController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RollController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API    routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/cameras', [CameraController::class, 'index']);
    Route::get('/cameras/{camera}', [CameraController::class, 'show']);
    Route::post('/cameras', [CameraController::class, 'store']);
    Route::put('/cameras/{camera}', [CameraController::class, 'update']);
    Route::delete('/cameras/{camera:name}', [CameraController::class, 'delete']);

    Route::get('/{roll}', [RollController::class, 'show']);
    Route::delete('/{roll}', [RollController::class, 'delete']);
    Route::put('/{roll}', [RollController::class, 'update']);
    /* In future can probably separate the following set of methods to a separate controller to prevent REST
    * naming collisions. */
    Route::get('/camera/{camera}/rolls', [RollController::class, 'index']);
    Route::post('/camera/{camera}/rolls', [RollController::class, 'store']);

    Route::post('/locations', [LocationController::class, 'store']);
    Route::put('/locations/{location}', [LocationController::class, 'update']);
    Route::get('/locations/{location}', [LocationController::class, 'show']);
    Route::delete('/locations/{location}', [LocationController::class, 'delete']);
 });

Route::any('{any}', function () {
    return response('Unauthorized', 401);
});
