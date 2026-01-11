<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Disk penyimpanan default yang digunakan oleh aplikasi
    | Sistem Peminjaman Ruangan & Inventaris ITENAS.
    |
    | Digunakan untuk menyimpan file seperti:
    | - Foto ruangan
    | - Foto inventaris
    | - Dokumen pendukung peminjaman
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Konfigurasi disk penyimpanan yang tersedia dalam aplikasi.
    | Aplikasi ini menggunakan penyimpanan lokal (local & public)
    | untuk kebutuhan pengelolaan data ruangan dan inventaris.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        /*
        |----------------------------------------------------------------------
        | Local Disk
        |----------------------------------------------------------------------
        |
        | Digunakan untuk penyimpanan file internal sistem
        | yang tidak diakses langsung oleh pengguna.
        |
        */

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        /*
        |----------------------------------------------------------------------
        | Public Disk
        |----------------------------------------------------------------------
        |
        | Digunakan untuk menyimpan file yang dapat diakses publik,
        | seperti gambar ruangan dan inventaris.
        |
        */

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        /*
        |----------------------------------------------------------------------
        | Amazon S3 (Opsional)
        |----------------------------------------------------------------------
        |
        | Dapat digunakan jika sistem dikembangkan lebih lanjut
        | menggunakan cloud storage.
        |
        */

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Konfigurasi symbolic link yang dibuat saat menjalankan
    | perintah `php artisan storage:link`.
    |
    | Digunakan agar file pada disk public dapat diakses
    | melalui browser.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];