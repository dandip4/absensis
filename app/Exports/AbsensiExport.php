<?php

namespace App\Exports;

use App\Models\Absensi;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\Week;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AbsensiExport implements FromQuery, WithHeadings, WithCustomStartCell, WithStyles, WithMapping, ShouldAutoSize
{
    protected $mata_kuliah_id;
    protected $kelas_id;
    protected $week_id;
    protected $mataKuliah;
    protected $kelas;
    protected $week;

    public function __construct($mata_kuliah_id, $kelas_id, $week_id)
    {
        $this->mata_kuliah_id = $mata_kuliah_id;
        $this->kelas_id = $kelas_id;
        $this->week_id = $week_id;

        $this->mataKuliah = MataKuliah::find($mata_kuliah_id);
        $this->kelas = Kelas::find($kelas_id);
        $this->week = Week::find($week_id);
    }

    public function query()
    {
        return Absensi::query()
            ->join('absensi_mahasiswas', 'absensis.id', '=', 'absensi_mahasiswas.absensi_id')
            ->join('users', 'users.id', '=', 'absensi_mahasiswas.user_id')
            ->where('absensis.mata_kuliah_id', $this->mata_kuliah_id)
            ->where('absensis.kelas_id', $this->kelas_id)
            ->where('absensis.week_id', $this->week_id)
            ->select('users.nama', 'users.npm', 'absensi_mahasiswas.status');
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NPM',
            'Status Kehadiran',
        ];
    }

    public function startCell(): string
    {
        return 'A6';
    }

    public function map($row): array
    {
        return [
            $row->nama,
            $row->npm,
            $row->status,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:C1');
        $sheet->mergeCells('A2:C2');
        $sheet->mergeCells('A3:C3');

        $sheet->setCellValue('A1', 'Mata Kuliah : ' . $this->mataKuliah->nama);
        $sheet->setCellValue('A2', 'Kelas               : ' . $this->kelas->nama);
        $sheet->setCellValue('A3', 'Minggu          : ' . $this->week->nama);

        return [
            'A1:C1' => ['font' => ['bold' => true]],
            'A2:C2' => ['font' => ['bold' => true]],
            'A3:C3' => ['font' => ['bold' => true]],
            'A4:C4' => ['font' => ['bold' => true]],  
        ];
    }

    public function getFileName()
    {
        return 'absensi_' . Str::slug($this->mataKuliah->nama) . '_' . Str::slug($this->kelas->nama) . '_' . Str::slug($this->week->nama) . '.xlsx';
    }
}
