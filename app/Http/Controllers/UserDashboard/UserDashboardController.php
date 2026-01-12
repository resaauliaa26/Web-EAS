<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalPeminjaman = Peminjaman::where('user_id', $userId)->count();

        $disetujui = Peminjaman::where('user_id', $userId)
            ->where('status', 'disetujui')
            ->count();

        $pending = Peminjaman::where('user_id', $userId)
            ->where('status', 'menunggu')
            ->count();

        $ditolak = Peminjaman::where('user_id', $userId)
            ->where('status', 'ditolak')
            ->count();

        return view('user.user-dashboard', compact(
            'totalPeminjaman',
            'disetujui',
            'pending',
            'ditolak'
        ));
    }
}