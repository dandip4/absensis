<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterMahasiswaController extends Controller
{
    public function index()
    {
        return view('auth.register_mahasiswa');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'jurusan' => 'required',
            'email' => 'required',
            'password' => 'required',
            'semester' => 'required',
        ]);
        User::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'semester' => $request->semester,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'role' => 3,
        ]);

        return redirect('/login')->with('status', 'Registration successful! Please login.');
    }
}
