<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/visitor', [VisitorController::class, 'index'])->name('visitor');
Route::post('/visitor', [VisitorController::class, 'store'])->name('checkIn');

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/visitor', [AdminController::class, 'visitor'])->name('visitor');
    Route::get('/appointment', [AdminController::class, 'appointment'])->name('appointment');
    Route::get('/manage', [AdminController::class, 'manage'])->name('manage');

    Route::post('/register', [AdminController::class, 'registerAdmin'])->name('registerAdmin');
    Route::post('/approve/{appointment}', [AdminController::class, 'approve'])->name('approve');
    Route::post('/deny/{appointment}', [AdminController::class, 'deny'])->name('deny');
});
