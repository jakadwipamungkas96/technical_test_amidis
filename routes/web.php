<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;

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

// Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware("auth");

// Kelurahan
Route::post('/save_kelurahan', [DashboardController::class, 'save_data']);
Route::post('/update_kelurahan', [DashboardController::class, 'update_data']);
Route::post('/delete_kelurahan', [DashboardController::class, 'delete_data']);

// pasien
Route::get('/pasien', [PasienController::class, 'index'])->middleware("auth");
Route::post('/save_pasien', [PasienController::class, 'save_data']);
Route::post('/update_pasien', [PasienController::class, 'update_data']);
Route::post('/delete_pasien', [PasienController::class, 'delete_data']);
Route::get('/generate-kartu/{id_pasien}', [PasienController::class, 'generatePDF']);