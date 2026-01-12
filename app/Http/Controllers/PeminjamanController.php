<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * ============================
     * USER / MAHASISWA
     * ============================
     */

    // FORM AJUKAN PEMINJAMAN
    public function create()
    {
        return view('user.peminjaman.create');
    }

    // SIMPAN DATA PEMINJAMAN
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
        ]);

        return redirect()
            ->route('dashboard.user')
            ->with('success', 'Pengajuan peminjaman berhasil dikirim dan menunggu persetujuan admin');
    }

    // RIWAYAT PEMINJAMAN USER
    public function riwayat()
    {
        $peminjamans = Peminjaman::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.peminjaman.riwayat', compact('peminjamans'));
    }

    /**
     * ============================
     * ADMIN
     * ============================
     */

    // LIST SEMUA PEMINJAMAN (ADMIN)
    public function index()
    {
        $peminjamans = Peminjaman::with('user')
            ->latest()
            ->get();

        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    // APPROVE PEMINJAMAN
    public function approve(Peminjaman $peminjaman)
    {
        $peminjaman->update([
            'status' => 'disetujui',
        ]);

        return back()->with('success', 'Peminjaman berhasil disetujui');
    }

    // REJECT PEMINJAMAN
    public function reject(Peminjaman $peminjaman)
    {
        $peminjaman->update([
            'status' => 'ditolak',
        ]);

        return back()->with('success', 'Peminjaman berhasil ditolak');
    }
}