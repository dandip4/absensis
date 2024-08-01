<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterDosenController extends Controller
{
    public function index()
    {
        return view('auth.register_dosen');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
            'bidang_keahlian' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'bidang_keahlian' => $request->bidang_keahlian,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'role' => 2,
        ]);

        return redirect('/login')->with('status', 'Registration successful! Please login.');
    }
}
