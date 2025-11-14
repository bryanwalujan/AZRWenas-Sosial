<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\OrphanageController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\NeedController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

// === HALAMAN PUBLIK ===
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/panti/{orphanage}', [PublicController::class, 'show'])->name('panti.show');

// === AUTH MANUAL ===
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// === DASHBOARD ADMIN ===
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('orphanages', OrphanageController::class);

        Route::prefix('orphanages/{orphanage}')->name('orphanages.')->group(function () {
            Route::resource('inventories', InventoryController::class)->except(['show']);
            Route::resource('children', ChildController::class)->except(['show']);
            Route::resource('needs', NeedController::class)->except(['show']);
        });
        Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');

    Route::put('/profile/email', [ProfileController::class, 'updateEmail'])->name('profile.email');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    });
});