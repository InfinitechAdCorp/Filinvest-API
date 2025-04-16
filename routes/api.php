<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\CareerController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\InquiryController;
use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\PropertyController;
use App\Http\Controllers\API\OfferingController;
use App\Http\Controllers\API\SubscriberController;

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
    Route::prefix('testimonials')->group(function () {
        Route::post('set-published', [AppointmentController::class, 'setPublished']);

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

    Route::prefix('properties')->group(function () {
        Route::get('', [PropertyController::class, 'getAll']);
        Route::get('{id}', [PropertyController::class, 'get']);
        Route::post('', [PropertyController::class, 'create']);
        Route::put('', [PropertyController::class, 'update']);
        Route::delete('{id}', [PropertyController::class, 'delete']);
    });

    Route::prefix('offerings')->group(function () {
        Route::get('', [OfferingController::class, 'getAll']);
        Route::get('{id}', [OfferingController::class, 'get']);
        Route::post('', [OfferingController::class, 'create']);
        Route::put('', [OfferingController::class, 'update']);
        Route::delete('{id}', [OfferingController::class, 'delete']);
    });

    Route::prefix('subscribers')->group(function () {
        Route::get('', [SubscriberController::class, 'getAll']);
        Route::get('{id}', [SubscriberController::class, 'get']);
        Route::post('', [SubscriberController::class, 'create']);
        Route::put('', [SubscriberController::class, 'update']);
        Route::delete('{id}', [SubscriberController::class, 'delete']);
    });
});
