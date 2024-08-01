<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function dashboard()
    {
        return view('dashboardC');
    }
    public function index()
    {
        $countMahasiswa = User::where('role', 3)->count();
        $countDosen = User::where('role', 2)->count();
        $countMatakuliah = Matakuliah::count();
        $countJurusan = Jurusan::count();
        return view('admin.dashboard', compact('countMahasiswa', 'countDosen', 'countMatakuliah', 'countJurusan'));

    }

    public function viewKelas()
    {
        $listdata = Kelas::all();
        return view('admin.kelas', compact('listdata'));
    }

    public function simpanKelas(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        if(!$request->id)
        {
            $data = new Kelas();
            $message = 'Data berhasil ditambahkan!';

        }else{
            $data = Kelas::findOrFail($request->id);
            $message = 'Data berhasil diperbarui!';

        }
        $data->nama = $request->nama;
        $data->save();
        return redirect()->route('kelas.view')->with('status', $message);
    }

    public function deleteKelas($id)
    {
        $data = Kelas::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route('kelas.view')->with('status', 'Data berhasil dihapus!');
    }
    public function viewJurusan()
    {
        $listdata = Jurusan::all();
        return view('admin.jurusan', compact('listdata'));
    }

    public function simpanJurusan(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        if(!$request->id)
        {
            $data = new Jurusan();
            $message = 'Data berhasil ditambahkan!';
        }else{
            $data = Jurusan::findOrFail($request->id);
            $message = 'Data berhasil diperbarui!';
        }
        $data->nama = $request->nama;
        $data->save();
        return redirect()->route('jurusan.view')->with('status', $message);
    }

    public function deleteJurusan($id)
    {
        $data = Jurusan::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route('jurusan.view')->with('status', 'Data berhasil dihapus!');
    }
    public function viewSemester()
    {
        $listdata = Semester::all();
        return view('admin.semester', compact('listdata'));
    }

    public function simpanSemester(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        if(!$request->id)
        {
            $data = new Semester();
            $message = 'Data berhasil ditambahkan!';
        }else{
            $data = Semester::findOrFail($request->id);
            $message = 'Data berhasil diperbarui!';
        }
        $data->nama = $request->nama;
        $data->save();
        return redirect()->route('semester.view')->with('status', $message);
    }

    public function deleteSemester($id)
    {
        $data = Semester::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route('semester.view')->with('status', 'Data berhasil dihapus!');
    }

    public function viewMatakuliah()
    {
        $jurusan = Jurusan::all();
        $semester = Semester::all();
        $listdata = MataKuliah::with('jurusan', 'semester')->get();
        return view('admin.matakuliah', compact('listdata', 'jurusan', 'semester'));
    }

    public function simpanMatakuliah(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan_id' => 'required',
            'semester_id' => 'required'
        ]);

        if(!$request->id)
        {
            $data = new MataKuliah();
            $message = 'Data berhasil ditambahkan!';
        }else{
            $data = MataKuliah::findOrFail($request->id);
            $message = 'Data berhasil diperbarui!';
        }
        $data->nama = $request->nama;
        $data->jurusan_id = $request->jurusan_id;
        $data->semester_id = $request->semester_id;
        $data->save();
        return redirect()->route('matakuliah.view')->with('status', $message);
    }

    public function deleteMatakuliah($id)
    {
        $data = MataKuliah::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route('matakuliah.view')->with('status', 'Data berhasil dihapus!');
    }
}
