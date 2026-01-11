<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    // ⬅️ INI YANG PALING PENTING
    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'inventory',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
