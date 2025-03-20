<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\TestimonialController;

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

    Route::prefix('testimonials')->group(function () {
        Route::get('', [TestimonialController::class, 'getAll']);
        Route::get('{id}', [TestimonialController::class, 'get']);
        Route::post('', [TestimonialController::class, 'create']);
        Route::put('', [TestimonialController::class, 'update']);
        Route::delete('{id}', [TestimonialController::class, 'delete']);
    });

    Route::prefix('faqs')->group(function () {
        Route::get('', [FaqController::class, 'getAll']);
        Route::get('{id}', [FaqController::class, 'get']);
        Route::post('', [FaqController::class, 'create']);
        Route::put('', [FaqController::class, 'update']);
        Route::delete('{id}', [FaqController::class, 'delete']);
    });
});
