<?php

use App\Auth\Http\API\Controllers\AuthController;
use App\Auth\Http\Middleware\AuthMiddleware;
use App\Auth\Http\Middleware\IsAuthorizedMiddleware;
use App\Option\Http\API\Controllers\OptionController;
use App\Review\Http\API\Controllers\RatingController;
use App\Review\Http\API\Controllers\ReviewController;
use App\Shared\Domain\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    throw new NotFoundException('Page not found');
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware([AuthMiddleware::class, IsAuthorizedMiddleware::class])->group(function () {
    Route::get('account', [AuthController::class, 'account'])->name('account.index');

    Route::prefix('options')->name('options.')->group(function () {
        Route::put('/', [OptionController::class, 'update'])->name('update');
        Route::get('/', [OptionController::class, 'index'])->name('index');
    });

    Route::prefix('reviews')->name('reviews.')->group(function () {
        Route::get('/', [ReviewController::class, 'index'])->name('index');
    });
    
    Route::prefix('rating')->name('rating.')->group(function () {
        Route::get('/', [RatingController::class, 'index'])->name('index');
    });
});
