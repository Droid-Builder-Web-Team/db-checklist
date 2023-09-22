<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Livewire\NewDroidRegistration;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainframeDroidController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware('auth')->get('mainframe_list', [MainframeDroidController::class, 'index'])->name('mainframe_list');
Route::middleware('auth')->get('admin', [AdminController::class, 'index'])->name('admin_dashboard');
Route::middleware('auth')->prefix('admin/droids')->group(function() {
    Route::get('/create', [AdminController::class, 'createDroid'])->name('create_droid');
    // Route::post('/store', [NewDroidRegistration::class, 'storeDroid'])->name('store_droid');
});