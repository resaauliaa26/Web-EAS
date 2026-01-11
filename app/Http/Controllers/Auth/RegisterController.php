<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|string',
            'email' => 'required|email|min:3',
            'password' => 'required|min:3',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        
        return redirect()->route('auth.register')->with('success', 'Sukses melakukan registrasi');
    }
}
