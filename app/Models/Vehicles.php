<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $table = 'vehicles';

    /**
     * CATATAN PENTING:
     * Model ini diadaptasi dari template "Vehicles"
     * namun secara KONSEP digunakan untuk:
     * SISTEM PEMINJAMAN RUANGAN & INVENTARIS ITENAS
     */
    protected $fillable = [
        'vehicle_name',        // Nama Ruangan / Inventaris
        'petrol',              // Sumber daya (listrik / manual / -)
        'plate',               // Kode Ruangan / Kode Inventaris
        'vehicle_color',       // Lokasi / Gedung
        'vehicle_type',        // ruangan | inventaris
        'vehicle_seat',        // Kapasitas (orang / unit)
        'vehicle_price',       // Biaya peminjaman (jika ada)
        'vehicle_year',        // Tahun pengadaan
        'vehicle_engine',      // Spesifikasi / daya
        'vehicle_doors',       // Jumlah akses / pintu
        'vehicle_transmision', // Dummy field (agar blade aman)
        'vehicle_merk',        // Unit / Merk / Fakultas
        'vehicle_status',      // tersedia | dipinjam | maintenance | dll
        'vehicle_image',       // Foto ruangan / inventaris
    ];
}