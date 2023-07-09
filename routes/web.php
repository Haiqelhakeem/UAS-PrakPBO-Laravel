<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransferController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth'); 
// Route::post('/dashboard', [DashboardController::class, 'balance']);

Route::get('/dashboard', [TransferController::class, 'localTransfer']);
Route::post('/dashboard', [TransferController::class, 'transferForm']);
// Route::get('/transfer', [TransferController::class, 'transferPage']);

Route::get('/history', [HistoryController::class, 'index']);
Route::post('/history', [HistoryController::class, 'show']);