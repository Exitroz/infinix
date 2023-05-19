<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmindashboardController;
use App\Http\Controllers\AdminController;


Route::group(['middleware' => 'admin', 'as' => 'admin.', 'prefix' => 'admin'], function () {
   Route::get('/dashboard', [AdmindashboardController::class, 'dashboard'])->name('dashboard');
   Route::get('/portfolios', [AdmindashboardController::class, 'portfolios'])->name('portfolios');
   Route::get('/comapany-info', [AdmindashboardController::class, 'company'])->name('company');
   Route::get('/users', [AdmindashboardController::class, 'users'])->name('users');
   Route::get('/transactions/{type}', [AdmindashboardController::class, 'transactions'])->name('transactions');

   Route::group(['as' => 'investments.', 'prefix' => 'investments'], function () {
      Route::post('/activate', [AdminController::class, 'activateInvestment'])->name('activate');
      Route::post('/suspend', [AdminController::class, 'suspendInvestment'])->name('suspend');
   });

   Route::group(['as' => 'users.', 'prefix' => 'users'], function () {
      Route::post('/verify', [AdminController::class, 'verifyUser'])->name('verify');
      Route::post('/suspend', [AdminController::class, 'suspendUser'])->name('suspend');
      Route::get('/edit/wallet/{id}', [AdmindashboardController::class, 'showUser'])->name('show-user');
      Route::post('/load/wallet', [AdminController::class, 'loadWallet'])->name('load-wallet');
   });

   Route::group(['as' => 'transactions.', 'prefix' => 'transactions'], function () {
      Route::post('/approve', [AdminController::class, 'approve'])->name('approve');
      Route::post('/decline', [AdminController::class, 'decline'])->name('decline');
   });

   Route::group(['as' => 'company.', 'prefix' => 'company'], function () {
      Route::get('/plans', [AdmindashboardController::class, 'plans'])->name('plans');

      Route::post('/plans/update', [AdminController::class, 'plansUpdate'])->name('plan.update');
      Route::post('/plans/new', [AdminController::class, 'plansNew'])->name('plans.new');
      Route::post('/plans/edit', [AdminController::class, 'plansEdit'])->name('plans.edit');
      Route::post('/plans/switch', [AdminController::class, 'plansSwitch'])->name('plans.switch');
      Route::post('/update', [AdminController::class, 'update'])->name('update');
   });
});