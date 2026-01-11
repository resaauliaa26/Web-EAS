<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | Channel log default yang digunakan oleh aplikasi
    | Sistem Peminjaman Ruangan & Inventaris ITENAS.
    |
    | Log digunakan untuk mencatat aktivitas sistem,
    | error aplikasi, dan proses penting lainnya.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | Digunakan untuk mencatat peringatan terkait
    | fitur PHP atau library yang sudah deprecated.
    |
    | Membantu pengembang menyiapkan sistem untuk
    | versi Laravel / PHP berikutnya.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => env('LOG_DEPRECATIONS_TRACE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Konfigurasi channel log yang tersedia.
    | Laravel menggunakan Monolog untuk menangani
    | pencatatan log aplikasi.
    |
    | Available drivers:
    | "single", "daily", "slack", "syslog",
    | "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels' => [

        /*
        |----------------------------------------------------------------------
        | Stack Log
        |----------------------------------------------------------------------
        |
        | Menggabungkan beberapa channel log menjadi satu.
        | Digunakan sebagai channel utama aplikasi.
        |
        */

        'stack' => [
            'driver' => 'stack',
            'channels' => explode(',', env('LOG_STACK', 'single')),
            'ignore_exceptions' => false,
        ],

        /*
        |----------------------------------------------------------------------
        | Single Log File
        |----------------------------------------------------------------------
        |
        | Menyimpan seluruh log aplikasi ke satu file.
        |
        */

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        /*
        |----------------------------------------------------------------------
        | Daily Log File
        |----------------------------------------------------------------------
        |
        | Menyimpan log harian dengan rotasi file otomatis.
        |
        */

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => env('LOG_DAILY_DAYS', 14),
            'replace_placeholders' => true,
        ],

        /*
        |----------------------------------------------------------------------
        | Slack Log (Opsional)
        |----------------------------------------------------------------------
        |
        | Mengirim log level kritis ke Slack.
        | Cocok untuk monitoring sistem produksi.
        |
        */

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => env('LOG_SLACK_USERNAME', 'Laravel Log'),
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'),
            'level' => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
        ],

        /*
        |----------------------------------------------------------------------
        | Papertrail Log (Opsional)
        |----------------------------------------------------------------------
        |
        | Digunakan untuk logging ke server Papertrail.
        |
        */

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://' . env('PAPERTRAIL_URL') . ':' . env('PAPERTRAIL_PORT'),
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        /*
        |----------------------------------------------------------------------
        | STDERR Log
        |----------------------------------------------------------------------
        |
        | Digunakan untuk menampilkan log ke standard error output.
        |
        */

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        /*
        |----------------------------------------------------------------------
        | Syslog
        |----------------------------------------------------------------------
        |
        | Logging menggunakan sistem syslog bawaan server.
        |
        */

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER),
            'replace_placeholders' => true,
        ],

        /*
        |----------------------------------------------------------------------
        | Errorlog
        |----------------------------------------------------------------------
        |
        | Logging ke PHP error log.
        |
        */

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        /*
        |----------------------------------------------------------------------
        | Null Log
        |----------------------------------------------------------------------
        |
        | Digunakan untuk menonaktifkan logging tertentu.
        |
        */

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        /*
        |----------------------------------------------------------------------
        | Emergency Log
        |----------------------------------------------------------------------
        |
        | Digunakan jika seluruh channel lain gagal.
        |
        */

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],

    ],

];