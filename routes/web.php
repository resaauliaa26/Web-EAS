<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserDashboard\UserDashboardController;
use App\Http\Controllers\AdminDashboard\AdminDashboardController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('index');
})->name('home');

/*
|--------------------------------------------------------------------------
| AUTH (GUEST)
|--------------------------------------------------------------------------
| ⚠️ WAJIB: route login bernama "login"
*/
Route::middleware('guest')->group(function () {

    // LOGIN
    Route::get('/login', [LoginController::class, 'index'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'store'])
        ->name('login.store');

    // REGISTER
    Route::get('/register', [RegisterController::class, 'index'])
        ->name('register');

    Route::post('/register', [RegisterController::class, 'save'])
        ->name('register.store');

    // ALIAS (opsional, aman)
    Route::get('/auth-login', fn () => redirect()->route('login'))
        ->name('auth.login');

    Route::get('/auth-register', fn () => redirect()->route('register'))
        ->name('auth.register');
});

/*
|--------------------------------------------------------------------------
| LOGOUT (POST ONLY)
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| USER / MAHASISWA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard Mahasiswa
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard.user');

    // Peminjaman
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])
        ->name('peminjaman.create');

    Route::post('/peminjaman', [PeminjamanController::class, 'store'])
        ->name('peminjaman.store');

    Route::get('/peminjaman/riwayat', [PeminjamanController::class, 'riwayat'])
        ->name('peminjaman.riwayat');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Kelola Ruangan / Inventaris
        Route::resource('vehicles', VehiclesController::class);

        // Kelola Peminjaman
        Route::get('/peminjaman', [PeminjamanController::class, 'index'])
            ->name('peminjaman.index');

        Route::patch('/peminjaman/{peminjaman}/approve', [PeminjamanController::class, 'approve'])
            ->name('peminjaman.approve');

        Route::patch('/peminjaman/{peminjaman}/reject', [PeminjamanController::class, 'reject'])
            ->name('peminjaman.reject');
});
