<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    // 🔥 PENTING: paksa nama tabel
    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'inventory',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        // ❌ JANGAN pakai catatan kalau kolom belum ada
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}