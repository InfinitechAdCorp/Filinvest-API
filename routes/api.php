<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\TypeController;

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

Route::prefix('')->group(function () {
    Route::prefix('types')->group(function () {
        Route::get('', [TypeController::class, 'getAll']);
        Route::get('{id}', [TypeController::class, 'get']);
        Route::post('', [TypeController::class, 'create']);
        Route::put('', [TypeController::class, 'update']);
        Route::delete('{id}', [TypeController::class, 'delete']);
    });
});
