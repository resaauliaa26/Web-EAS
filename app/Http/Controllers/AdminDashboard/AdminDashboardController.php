<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPeminjaman = Peminjaman::count();

        $disetujui = Peminjaman::where('status', 'disetujui')->count();

        $menunggu = Peminjaman::where('status', 'menunggu')->count();

        $ditolak = Peminjaman::where('status', 'ditolak')->count();

        return view('admin.admin-dashboard', compact(
            'totalPeminjaman',
            'disetujui',
            'menunggu',
            'ditolak'
        ));
    }
}