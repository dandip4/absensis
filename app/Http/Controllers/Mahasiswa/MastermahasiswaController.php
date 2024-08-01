<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\AbsensiMahasiswa;
use App\Models\Week;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MastermahasiswaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mataKuliahs = $user->mataKuliahs;
        return view('mahasiswa.absensi.index', compact('mataKuliahs'));
    }

    public function showWeeks($mataKuliahId)
    {
        $user = auth()->user();

        $weeks = Week::all();
        $absensi = Absensi::where('mata_kuliah_id', $mataKuliahId)->get();
        $absensiStatus = [];

        foreach ($weeks as $week) {
            $weekAbsensi = $absensi->firstWhere('week_id', $week->id);

            if ($weekAbsensi) {
                $statusAlpa = AbsensiMahasiswa::where('user_id', $user->id)
                                              ->where('absensi_id', $weekAbsensi->id)
                                              ->where('status', 'alpa')
                                              ->exists();

                $alreadyAbsent = AbsensiMahasiswa::where('user_id', $user->id)
                                                 ->where('absensi_id', $weekAbsensi->id)
                                                 ->exists();

                $absensiStatus[$week->id] = [
                    'alreadyAbsent' => $alreadyAbsent,
                    'statusAlpa' => $statusAlpa
                ];
            } else {
                $absensiStatus[$week->id] = [
                    'alreadyAbsent' => false,
                    'statusAlpa' => false
                ];
            }
        }

        return view('mahasiswa.absensi.weeks', compact('mataKuliahId', 'weeks', 'absensiStatus'));    }

    public function showAbsenForm($mataKuliahId, $weekId)
    {
        $user = auth()->user();

        $absensi = Absensi::where('mata_kuliah_id', $mataKuliahId)
                          ->where('week_id', $weekId)
                          ->first();
        if (!$absensi) {
            return back()->with('errorrr', 'Absensi belum tersedia.');
        }


        if (now()->isAfter($absensi->deadline_time)) {
            $statusAlpa = AbsensiMahasiswa::where('user_id', $user->id)
                                          ->where('absensi_id', $absensi->id)
                                          ->where('status', 'alpa')
                                          ->exists();

            if ($statusAlpa) {
                return back()->with('errorr', 'Absensi sudah melewati batas waktu.');
            }
        }

        $alreadyAbsent = AbsensiMahasiswa::where('user_id', $user->id)
                                         ->where('absensi_id', $absensi->id)
                                         ->exists();
        if ($alreadyAbsent) {
        return back()->with('error', 'Anda sudah absen untuk mata kuliah minggu ini.');
        }



        return view('mahasiswa.absensi.form', compact('absensi'));
    }

    public function storeAbsen(Request $request, $mataKuliahId, $weekId)
    {
        $request->validate([
            'status' => 'required|in:hadir,sakit,izin,alpa',
        ]);

        $user = auth()->user();
        $absensi = Absensi::where('mata_kuliah_id', $mataKuliahId)
                          ->where('week_id', $weekId)
                          ->first();

        AbsensiMahasiswa::create([
            'user_id' => $user->id,
            'absensi_id' => $absensi->id,
            'status' => $request->status,
        ]);
        return redirect()->route('mahasiswa.absensi.index')->with('status', 'Absensi berhasil disimpan.');
    }
}
