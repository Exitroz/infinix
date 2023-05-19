<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact-us');
Route::get('/help-center', [HomeController::class, 'helpCenter'])->name('help-center');

Route::get('/test', [TestController::class, 'runTest'])->name('test');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__ . '/user.php';