<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\InvestmentController;
use App\Http\Controllers\Api\PlanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['web']], function () {
    Route::apiResources([
        'dashboard' => DashboardController::class,
        'company-info' => CompanyController::class,
    ]);

    Route::get('/company/plans', [CompanyController::class, 'plans'])->name('plans');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/calulate/usd-balance', [UserController::class, 'usdBalValue'])->name('usd.bal.value');

        Route::group(['prefix' => 'company', 'as' => 'company'], function () {
            Route::get('/plans', [PlanController::class, 'listPlans'])->name('plans');
        });

        Route::group(['prefix' => 'investment'], function () {
            Route::post('/create', [InvestmentController::class, 'invest'])->name('invest');
            Route::post('/withdraw', [InvestmentController::class, 'withdraw'])->name('withdraw');
            Route::post('/re-invest', [InvestmentController::class, 'reInvest'])->name('re-invest');
        });

        Route::group(['prefix' => 'transaction'], function () {
            Route::post('/deposit', [TransactionController::class, 'deposit'])->name('deposit');
        });

        Route::group(['prefix' => 'portfolios', 'as' => 'portfolio.'], function () {
            Route::get('/all', [UserController::class, 'porfolios'])->name('all');
        });
    });    
});