<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * FORM AJUKAN PEMINJAMAN
     */
    public function create()
    {
        return view('user.peminjaman.create');
    }

    /**
     * SIMPAN DATA PEMINJAMAN
     */
    public function store(Request $request)
    {
        $request->validate([
            'inventory' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Peminjaman::create([
            'user_id' => Auth::id(),
            'inventory' => $request->inventory,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => 'menunggu',
            'catatan' => null,
        ]);

        return redirect()
            ->route('dashboard.user')
            ->with('success', 'Pengajuan peminjaman berhasil dikirim dan menunggu persetujuan admin');
    }

    /**
     * RIWAYAT PEMINJAMAN USER
     */
    public function riwayat()
    {
        $peminjamans = Peminjaman::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.peminjaman.riwayat', compact('peminjamans'));
    }
}
