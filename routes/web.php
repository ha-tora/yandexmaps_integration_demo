<?php

use App\Auth\Http\Middleware\AuthMiddleware;
use App\Auth\Http\Web\Controllers\AuthController;
use App\Auth\Http\Web\Middleware\RedirectIfNotAuthorizedMiddleware;
use App\Option\Http\Web\Controllers\OptionController;
use App\Review\Http\Web\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::middleware([AuthMiddleware::class, RedirectIfNotAuthorizedMiddleware::class])->group(function () {
    Route::prefix('options')->name('options.')->group(function () {
        Route::get('/', [OptionController::class, 'index'])->name('index');
    });

    Route::prefix('reviews')->name('reviews.')->group(function () {
        Route::get('/', [ReviewController::class, 'index'])->name('index');
    });
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
});

Route::get('/', function () {
    return redirect()->route('reviews.index');
})->name('home');

Route::fallback(function () {
    return redirect()->route('home');
});