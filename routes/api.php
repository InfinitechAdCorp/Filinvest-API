<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CareerController;
use App\Http\Controllers\API\AwardController;

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

    Route::prefix('blogs')->group(function () {
        Route::get('', [BlogController::class, 'getAll']);
        Route::get('{id}', [BlogController::class, 'get']);
        Route::post('', [BlogController::class, 'create']);
        Route::put('', [BlogController::class, 'update']);
        Route::delete('{id}', [BlogController::class, 'delete']);
    });

    Route::prefix('awards')->group(function () {
        Route::get('', [AwardController::class, 'getAll']);
        Route::get('{id}', [AwardController::class, 'get']);
        Route::post('', [AwardController::class, 'create']);
        Route::put('', [AwardController::class, 'update']);
        Route::delete('{id}', [AwardController::class, 'delete']);
    });

    Route::prefix('careers')->group(function () {
        Route::get('', [CareerController::class, 'getAll']);
        Route::get('{id}', [CareerController::class, 'get']);
        Route::post('', [CareerController::class, 'create']);
        Route::put('', [CareerController::class, 'update']);
        Route::delete('{id}', [CareerController::class, 'delete']);
    });
});
