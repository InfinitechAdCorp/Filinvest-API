<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\CareerController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\InquiryController;
use App\Http\Controllers\API\AppointmentController;
use App\Models\Appointment;

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

    Route::prefix('careers')->group(function () {
        Route::get('', [CareerController::class, 'getAll']);
        Route::get('{id}', [CareerController::class, 'get']);
        Route::post('', [CareerController::class, 'create']);
        Route::put('', [CareerController::class, 'update']);
        Route::delete('{id}', [CareerController::class, 'delete']);
    });

    Route::prefix('articles')->group(function () {
        Route::get('', [ArticleController::class, 'getAll']);
        Route::get('{id}', [ArticleController::class, 'get']);
        Route::post('', [ArticleController::class, 'create']);
        Route::put('', [ArticleController::class, 'update']);
        Route::delete('{id}', [ArticleController::class, 'delete']);
    });

    Route::prefix('inquiries')->group(function () {
        Route::get('', [InquiryController::class, 'getAll']);
        Route::get('{id}', [InquiryController::class, 'get']);
        Route::post('', [InquiryController::class, 'create']);
        Route::put('', [InquiryController::class, 'update']);
        Route::delete('{id}', [InquiryController::class, 'delete']);
    });

    Route::prefix('appointments')->group(function () {
        Route::post('set-status', [AppointmentController::class, 'setStatus']);

        Route::get('', [AppointmentController::class, 'getAll']);
        Route::get('{id}', [AppointmentController::class, 'get']);
        Route::post('', [AppointmentController::class, 'create']);
        Route::put('', [AppointmentController::class, 'update']);
        Route::delete('{id}', [AppointmentController::class, 'delete']);
    });
});
