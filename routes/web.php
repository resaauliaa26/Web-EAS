<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserDashboard\UserDashboardController;
use App\Http\Controllers\AdminDashboard\AdminDashboardController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home-orange'); // GANTI INI dengan file view baru
})->name('home');

/*
|--------------------------------------------------------------------------
| ROUTE PENJEMBATAN (ANTI KLIK 2x LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/go-login', function () {
    return redirect()->route('login');
})->name('go.login');

/*
|--------------------------------------------------------------------------
| AUTH (GUEST)
|--------------------------------------------------------------------------
| ⚠️ route login WAJIB bernama "login"
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

        // Kelola Peminjaman
        Route::get('/peminjaman', [PeminjamanController::class, 'index'])
            ->name('peminjaman.index');

        Route::patch('/peminjaman/{peminjaman}/approve', [PeminjamanController::class, 'approve'])
            ->name('peminjaman.approve');

        Route::patch('/peminjaman/{peminjaman}/reject', [PeminjamanController::class, 'reject'])
            ->name('peminjaman.reject');
});

/*
|--------------------------------------------------------------------------
| FIX UNTUK RAILWAY DEPLOYMENT
|--------------------------------------------------------------------------
| Route untuk health check, robots.txt, sitemap.xml
*/

// Fix untuk Railway - Health Check (WAJIB ADA)
Route::get('/health', function() {
    return response()->json([
        'status' => 'ok',
        'app' => config('app.name', 'Sistem Peminjaman ITENAS'),
        'env' => config('app.env', 'production'),
        'time' => now()->format('Y-m-d H:i:s'),
        'url' => config('app.url', 'https://web-eas-production.up.railway.app')
    ]);
})->name('health.check');

// Fix untuk sitemap.xml (jika ada file di public)
Route::get('/sitemap.xml', function() {
    if (file_exists(public_path('sitemap.xml'))) {
        return response()->file(public_path('sitemap.xml'));
    }
    return response()->json(['message' => 'Sitemap not found'], 404);
});

// Fix untuk robots.txt (WAJIB ADA)
Route::get('/robots.txt', function() {
    $content = "User-agent: *\n";
    $content .= "Allow: /\n\n";
    $content .= "Sitemap: " . url('/sitemap.xml') . "\n";
    
    return response($content, 200, [
        'Content-Type' => 'text/plain',
        'Cache-Control' => 'public, max-age=3600'
    ]);
});

// Fix untuk security.txt (optional)
Route::get('/.well-known/security.txt', function() {
    $content = "Contact: admin@itenas.ac.id\n";
    $content .= "Expires: 2026-12-31T23:59:59.000Z\n";
    $content .= "Preferred-Languages: id, en\n";
    
    return response($content, 200, [
        'Content-Type' => 'text/plain',
        'Cache-Control' => 'public, max-age=86400'
    ]);
});

// Route untuk clear cache (penting untuk deployment)
Route::get('/clear-cache', function() {
    if (app()->environment('production')) {
        return response('Cache clear disabled in production', 403);
    }
    
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    
    return "Cache cleared successfully! <a href='/'>Back to Home</a>";
})->name('clear.cache');

// Route untuk test environment
Route::get('/env-test', function() {
    return response()->json([
        'app_name' => config('app.name'),
        'app_env' => config('app.env'),
        'app_debug' => config('app.debug'),
        'app_url' => config('app.url'),
        'asset_url' => config('app.asset_url'),
        'timezone' => config('app.timezone'),
        'db_connection' => config('database.default'),
    ]);
});

// Fallback route untuk asset yang tidak ditemukan
Route::get('/assets/{any}', function($any) {
    $path = public_path("assets/{$any}");
    if (file_exists($path)) {
        return response()->file($path);
    }
    return response()->json(['error' => 'Asset not found'], 404);
})->where('any', '.*');

// Fallback untuk build assets (jika menggunakan Vite)
Route::get('/build/{any}', function($any) {
    $path = public_path("build/{$any}");
    if (file_exists($path)) {
        return response()->file($path);
    }
    return response()->json(['error' => 'Build asset not found'], 404);
})->where('any', '.*');

// Route untuk testing view baru
Route::get('/test-view', function() {
    if (view()->exists('home-orange')) {
        return view('home-orange');
    }
    return "View 'home-orange' not found. Creating fallback view...";
});