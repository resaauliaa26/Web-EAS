<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | Mailer default yang digunakan oleh aplikasi
    | Sistem Peminjaman Ruangan & Inventaris ITENAS.
    |
    | Secara default menggunakan "log" agar email
    | dicatat ke log selama tahap pengembangan.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Konfigurasi seluruh mailer yang dapat digunakan
    | oleh aplikasi untuk mengirim notifikasi email,
    | seperti:
    | - Notifikasi peminjaman disetujui
    | - Pemberitahuan penolakan
    | - Reset password pengguna
    |
    | Supported transports:
    | "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    | "postmark", "resend", "log", "array",
    | "failover", "roundrobin"
    |
    */

    'mailers' => [

        /*
        |----------------------------------------------------------------------
        | SMTP Mailer
        |----------------------------------------------------------------------
        |
        | Digunakan jika aplikasi terhubung dengan
        | layanan email (misalnya Gmail, Mailtrap).
        |
        */

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env(
                'MAIL_EHLO_DOMAIN',
                parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)
            ),
        ],

        /*
        |----------------------------------------------------------------------
        | SES / Postmark / Resend (Opsional)
        |----------------------------------------------------------------------
        |
        | Digunakan untuk layanan email pihak ketiga
        | jika sistem dikembangkan lebih lanjut.
        |
        */

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        /*
        |----------------------------------------------------------------------
        | Sendmail
        |----------------------------------------------------------------------
        |
        | Menggunakan sendmail bawaan server.
        |
        */

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        /*
        |----------------------------------------------------------------------
        | Log Mailer
        |----------------------------------------------------------------------
        |
        | Semua email dicatat ke file log.
        | Cocok untuk pengembangan & debugging.
        |
        */

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        /*
        |----------------------------------------------------------------------
        | Array Mailer
        |----------------------------------------------------------------------
        |
        | Digunakan untuk testing (email tidak dikirim).
        |
        */

        'array' => [
            'transport' => 'array',
        ],

        /*
        |----------------------------------------------------------------------
        | Failover & Round Robin
        |----------------------------------------------------------------------
        |
        | Digunakan untuk memastikan email tetap terkirim
        | jika salah satu mailer gagal.
        |
        */

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | Alamat pengirim default untuk seluruh email
    | yang dikirim oleh sistem peminjaman ruangan
    | & inventaris ITENAS.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'no-reply@itenas.ac.id'),
        'name' => env('MAIL_FROM_NAME', 'Sistem Peminjaman ITENAS'),
    ],

];