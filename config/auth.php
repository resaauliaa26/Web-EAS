<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Konfigurasi autentikasi default untuk aplikasi
    | Sistem Peminjaman Ruangan & Inventaris ITENAS.
    |
    | Guard dan broker password menggunakan konfigurasi
    | standar Laravel agar sistem tetap stabil.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Guard yang digunakan untuk autentikasi pengguna sistem,
    | seperti:
    | - Admin
    | - Petugas
    | - Peminjam
    |
    | Menggunakan session berbasis web.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Provider untuk mengambil data pengguna dari database
    | menggunakan model User (Eloquent).
    |
    | Model User merepresentasikan seluruh pengguna
    | dalam sistem peminjaman ruangan & inventaris ITENAS.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // Alternatif jika menggunakan query langsung ke tabel
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Konfigurasi reset password untuk pengguna sistem
    | peminjaman ruangan & inventaris ITENAS.
    |
    | Token reset password bersifat sementara demi keamanan.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Waktu (dalam detik) sebelum pengguna diminta
    | mengonfirmasi ulang password untuk aksi sensitif.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];