<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Koneksi queue default yang digunakan oleh aplikasi
    | Sistem Peminjaman Ruangan & Inventaris ITENAS.
    |
    | Queue digunakan untuk menjalankan proses latar belakang
    | seperti pengiriman notifikasi, logging, atau proses
    | peminjaman yang membutuhkan waktu.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Konfigurasi koneksi queue yang tersedia.
    | Aplikasi ini menggunakan queue berbasis database
    | agar mudah dikelola tanpa layanan tambahan.
    |
    | Drivers:
    | "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        /*
        |----------------------------------------------------------------------
        | Sync Queue
        |----------------------------------------------------------------------
        |
        | Menjalankan job secara langsung (tanpa antrian).
        | Cocok untuk testing dan proses sederhana.
        |
        */

        'sync' => [
            'driver' => 'sync',
        ],

        /*
        |----------------------------------------------------------------------
        | Database Queue
        |----------------------------------------------------------------------
        |
        | Menyimpan job ke tabel database (jobs).
        | Digunakan sebagai queue utama sistem.
        |
        */

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        /*
        |----------------------------------------------------------------------
        | Beanstalkd (Opsional)
        |----------------------------------------------------------------------
        |
        | Digunakan jika aplikasi terintegrasi
        | dengan Beanstalkd queue server.
        |
        */

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => false,
        ],

        /*
        |----------------------------------------------------------------------
        | Amazon SQS (Opsional)
        |----------------------------------------------------------------------
        |
        | Digunakan jika sistem dikembangkan
        | menggunakan layanan AWS SQS.
        |
        */

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        /*
        |----------------------------------------------------------------------
        | Redis Queue (Opsional)
        |----------------------------------------------------------------------
        |
        | Digunakan untuk performa tinggi
        | pada skala aplikasi besar.
        |
        */

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk menyimpan informasi
    | batch job pada database.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | Konfigurasi penyimpanan job yang gagal diproses.
    | Data ini berguna untuk debugging dan monitoring sistem.
    |
    | Supported drivers:
    | "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];