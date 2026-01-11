<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * TAMPILKAN FORM LOGIN
     */
    public function index()
    {
        return view('login'); // pastikan file: resources/views/login.blade.php
    }

    /**
     * PROSES LOGIN
     */
    public function store(Request $request)
    {
        // VALIDASI INPUT
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // ATTEMPT LOGIN
        if (Auth::attempt($credentials)) {

            // PENTING: regenerate session (hindari loop & bug auth)
            $request->session()->regenerate();

            $user = Auth::user();

            // REDIRECT BERDASARKAN ROLE
            if ($user->role === 'admin') {
                return redirect()
                    ->route('admin.dashboard')
                    ->with('success', 'Berhasil login sebagai Admin');
            }

            // DEFAULT: MAHASISWA / USER
            return redirect()
                ->route('dashboard.user')
                ->with('success', 'Berhasil login');
        }

        // JIKA GAGAL LOGIN
        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Email atau password salah');
    }
}
