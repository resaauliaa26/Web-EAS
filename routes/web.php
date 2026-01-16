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
    return view('index');
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
        'app' => config('app.name'),
        'env' => config('app.env'),
        'time' => now()->format('Y-m-d H:i:s')
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

// Fix untuk asset testing (optional, bisa dihapus setelah deploy sukses)
Route::get('/test-assets', function() {
    echo "<h1>Asset Test Page</h1>";
    echo "<p>Checking if assets are loading correctly...</p>";
    
    // Test CSS
    echo "<style>.test-css { color: green; font-weight: bold; }</style>";
    echo "<p class='test-css'>✅ CSS is working</p>";
    
    // Test image
    $images = [
        '/assets/images/landingpage/unggul.png',
        '/assets/images/landingpage/itenas.jpg',
        '/assets/images/landingpage/sc.png'
    ];
    
    foreach ($images as $image) {
        if (file_exists(public_path($image))) {
            echo "<p>✅ Image exists: $image</p>";
        } else {
            echo "<p style='color: red;'>❌ Image missing: $image</p>";
        }
    }
    
    echo "<hr><p>Current URL: " . url()->current() . "</p>";
    echo "<p>APP_URL: " . config('app.url') . "</p>";
    echo "<p>Environment: " . app()->environment() . "</p>";
})->name('test.assets');