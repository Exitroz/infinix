<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserdashboardController;
use App\Http\Controllers\InvestmentController;


Route::group(['middleware' => 'auth', 'as' => 'user.', 'prefix' => 'account'], function () {
   Route::get('/dashboard', [UserdashboardController::class, 'dashboard'])->name('dashboard');
   Route::get('/profile', [UserdashboardController::class, 'profile'])->name('profile');
   Route::get('/settings', [UserdashboardController::class, 'settings'])->name('settings');
   Route::get('/referral', [UserdashboardController::class, 'referral'])->name('referral');
   Route::get('/portfolios', [UserdashboardController::class, 'portfolio'])->name('portfolio');
   Route::get('/pricing', [UserdashboardController::class, 'pricing'])->name('pricing');
   Route::get('/transactions/{type}', [UserdashboardController::class, 'transactions'])->name('transactions');
   Route::get('/deposit/{coin}', [UserdashboardController::class, 'deposit'])->name('deposit');

   Route::post('/profile/edit', [UserdashboardController::class, 'editProfile'])->name('profile.edit');
   Route::post('/profile/edit-password', [UserdashboardController::class, 'updatePassword'])->name('profile.edit-password');
   Route::post('/profile/edit-notifications', [UserdashboardController::class, 'updateNotifications'])->name('profile.edit-notifications');

   Route::group(['prefix' => 'investment', 'as' => 'investment.'], function () {
      Route::get('/calulate/usd-balance', [InvestmentController::class, 'createInvestment'])->name('create');
   });
});