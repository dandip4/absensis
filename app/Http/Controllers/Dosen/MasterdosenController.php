<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\User;
use App\Models\Week;
use App\Exports\AbsensiExport;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterdosenController extends Controller
{
    public function index()
    {
        $dosenId = Auth::id();

        $mataKuliahs = User::find($dosenId)->mataKuliahs;

        $countMahasiswa = 0;

        foreach ($mataKuliahs as $mataKuliah) {
            $countMahasiswa += $mataKuliah->users()
                                         ->where('role', 3)
                                         ->count();
        }
        $countAbsensi = Absensi::count();

        $countWeek = Week::count();
        return view('dosen.dashboard', compact('countMahasiswa', 'countWeek', 'countAbsensi'));
    }
    public function viewMahasiswa(Request $request)
    {
        $dosenId = Auth::id();

        $mataKuliahs = User::find($dosenId)->mataKuliahs;
        $kelases = Kelas::all();

        $selectedMataKuliah = $request->mata_kuliah_id;
        $selectedKelas = $request->kelas_id;
        $mahasiswas = collect();

        if ($selectedMataKuliah && $selectedKelas) {
            $mahasiswas = MataKuliah::find($selectedMataKuliah)
                                    ->users()
                                    ->where('kelas_id', $selectedKelas)
                                    ->where('role', 3)
                                    ->get();
        }

        return view('dosen.mahasiswa', compact('mahasiswas', 'mataKuliahs', 'kelases', 'selectedMataKuliah', 'selectedKelas'));

    }

    public function exportAbsensi(Request $request)
    {
        $mata_kuliah_id = $request->query('mata_kuliah_id');
        $kelas_id = $request->query('kelas_id');
        $week_id = $request->query('week_id');

        return Excel::download(new AbsensiExport($mata_kuliah_id, $kelas_id, $week_id), (new AbsensiExport($mata_kuliah_id, $kelas_id, $week_id))->getFileName());
    }

    public function viewWeek()
    {
        $listdata = Week::all();
        return view('dosen.week', compact('listdata'));
    }

    public function simpanWeek(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        if(!$request->id)
        {
            $data = new Week();
        }else{
            $data = Week::findOrFail($request->id);
        }
        $data->nama = $request->nama;
        $data->save();
        return redirect()->route('week.view');
    }

    public function deleteWeek($id)
    {
        $data = Week::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route('week.view');
    }

    public function indexAbsen()
    {
        $dosenId = auth()->user()->id;

        $absensis = Absensi::with('mataKuliah', 'kelas', 'week')->where('user_id', $dosenId)->get();
        return view('dosen.absensi.index', compact('absensis'));
    }

    public function createAbsen()
    {
        $weeks = Week::all();
        $kelas = Kelas::all();
        $user = auth()->user();
        $mataKuliahs = $user->mataKuliahs;

        return view('dosen.absensi.create', compact('weeks', 'kelas', 'mataKuliahs'));
    }

    public function storeAbsen(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required',
            'kelas_id' => 'required',
            'week_id' => 'required',
            'start_time' => 'required|date',
            'deadline_time' => 'required|date|after:start_time',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        Absensi::create($data);

        return redirect()->route('absensi.view')->with('status', 'Data berhasil dibuat.');
    }

    public function editAbsen($id)
    {
        $absensi = Absensi::findOrFail($id);
        $weeks = Week::all();
        $kelas = Kelas::all();
        $user = auth()->user();
        $mataKuliahs = $user->mataKuliahs;

        return view('dosen.absensi.edit', compact('absensi', 'weeks', 'kelas', 'mataKuliahs'));
    }

    public function updateAbsen(Request $request, $id)
    {
        $request->validate([
            'mata_kuliah_id' => 'required',
            'kelas_id' => 'required',
            'week_id' => 'required',
            'start_time' => 'required|date',
            'deadline_time' => 'required|date|after:start_time',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect()->route('absensi.view')->with('status', 'Data berhasil diupdate.');
    }

    public function deleteAbsen($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.view')->with('status', 'Data berhasil dihapus.');
    }

    public function viewAbsensiMahasiswa(Request $request)
    {
        $dosenId = Auth::id();

        $mataKuliahs = User::find($dosenId)->mataKuliahs;
        $kelases = Kelas::all();
        $weeks = Week::all();

        $selectedMataKuliah = $request->mata_kuliah_id;
        $selectedKelas = $request->kelas_id;
        $selectedWeek = $request->week_id;
        $absensis = collect();

        if ($selectedMataKuliah && $selectedKelas && $selectedWeek) {
            $absensis = Absensi::where('mata_kuliah_id', $selectedMataKuliah)
                                ->where('kelas_id', $selectedKelas)
                                ->where('week_id', $selectedWeek)
                                ->with('users')
                                ->get();
        }

        return view('dosen.mahasiswaabsen', compact('absensis', 'mataKuliahs', 'kelases', 'weeks', 'selectedMataKuliah', 'selectedKelas', 'selectedWeek'));
    }
}
