<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
	Route::get('registrarme', [RegisteredUserController::class, 'create'])
							->name('register');

	Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

	Route::get('login', [AuthenticatedSessionController::class, 'create'])
							->name('login');

	Route::post('login', [AuthenticatedSessionController::class, 'store']);

	Route::get('forgot-password', function(){ return Inertia::render('PasswordReset'); })->name('password.request');
	Route::post('reset-password', [PasswordController::class, 'reset'])->name('password.reset');
});

Route::middleware('auth')->group(function () {
	Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

	Route::put('password', [PasswordController::class, 'update'])->name('password.update');

	Route::post('mis-datos', [RegisteredUserController::class, 'update'])->name('my-account.update');

	Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
							->name('logout');
});
