<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function viewMahasiswa()
    {
        $listdata = User::where('role', 3)->get();
        return view('admin.mahasiswa.index', compact('listdata'));
    }

    public function createMahasiswa()
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $semester = Semester::all();
        $mata_kuliahs = MataKuliah::all();

        return view('admin.mahasiswa.create', compact('jurusan', 'kelas', 'semester', 'mata_kuliahs'));
    }

    public function getMataKuliah($jurusan_id, $semester_id)
    {
        $mataKuliahs = MataKuliah::where('jurusan_id', $jurusan_id)
                                ->where('semester_id', $semester_id)
                                ->get();
        return response()->json($mataKuliahs);
    }


    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'npm' => 'required',
            'semester_id' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'mata_kuliah_ids' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        $user = User::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'jurusan_id' => $request->jurusan_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'semester_id' => $request->semester_id,
            'kelas_id' => $request->kelas_id,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'role' => 3,
        ]);

        $user->mataKuliahs()->attach($request->mata_kuliah_ids);

        return redirect()->route('mahasiswa.view')->with('status', 'Data berhasil ditambahkan!');
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = User::findOrFail($id);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $semester = Semester::all();
        $mata_kuliahs = MataKuliah::all();

        return view('admin.mahasiswa.edit', compact('mahasiswa', 'jurusan', 'kelas', 'semester', 'mata_kuliahs'));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'npm' => 'required',
            'semester_id' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'mata_kuliah_ids' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $mahasiswa = User::findOrFail($id);

        $mahasiswa->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'jurusan_id' => $request->jurusan_id,
            'email' => $request->email,
            'semester_id' => $request->semester_id,
            'kelas_id' => $request->kelas_id,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        $mahasiswa->mataKuliahs()->sync($request->mata_kuliah_ids);

        return redirect()->route('mahasiswa.view')->with('status', 'Data berhasil diperbarui!');
    }

    public function deleteMahasiswa($id)
    {
        $user = User::findOrFail($id);
        $user->mataKuliahs()->detach();
        $user->delete();

        return redirect()->route('mahasiswa.view')->with('status', 'Data berhasil dihapus!');
    }

    public function viewDosen()
    {
        $listdata = User::where('role', 2)->get();
        return view('admin.dosen.index', compact('listdata'));
    }

    public function createDosen()
    {
        $mata_kuliahs = MataKuliah::all();

        return view('admin.dosen.create', compact('mata_kuliahs'));
    }

    public function storeDosen(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'nidn' => 'required',
            'mata_kuliah_ids' => 'required',
            'no_telp' => 'required',
            'bidang_keahlian' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
        ]);
        $user = User::create([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bidang_keahlian' => $request->bidang_keahlian,
            'no_telp' => $request->no_telp,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'role' => 2,
        ]);

        $user->mataKuliahs()->attach($request->mata_kuliah_ids);

        return redirect()->route('dosen.view')->with('status', 'Data berhasil ditambahkan!');
    }

    public function editDosen($id)
    {
        $dosen = User::findOrFail($id);
        $mata_kuliahs = MataKuliah::all();

        return view('admin.dosen.edit', compact('dosen', 'mata_kuliahs'));
    }

    public function updateDosen(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'nidn' => 'required',
            'mata_kuliah_ids' => 'required',
            'no_telp' => 'required',
            'bidang_keahlian' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
        ]);

        $dosen = User::findOrFail($id);

        $dosen->update([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'mata_kuliah_ids' => $request->mata_kuliah_ids,
            'email' => $request->email,
            'bidang_keahlian' => $request->bidang_keahlian,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        $dosen->mataKuliahs()->sync($request->mata_kuliah_ids);

        return redirect()->route('dosen.view')->with('status', 'Data berhasil diperbarui!');
    }

    public function deleteDosen($id)
    {
        $user = User::findOrFail($id);
        $user->mataKuliahs()->detach();
        $user->delete();

        return redirect()->route('dosen.view')->with('status', 'Data berhasil dihapus!');
    }

}
