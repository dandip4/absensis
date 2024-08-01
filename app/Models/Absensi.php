<?php

namespace App\Models;

use App\Jobs\MarkAbsentStudents;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'mata_kuliah_id', 'user_id', 'kelas_id', 'week_id', 'start_time', 'deadline_time'
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function absensiMahasiswas()
    {
        return $this->hasMany(AbsensiMahasiswa::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'absensi_mahasiswas')->withPivot('status');
    }
    public function getUnattendedStudents()
    {
        $students = $this->kelas->users;
        $attendedStudentIds = $this->users->pluck('id');
        return $students->whereNotIn('id', $attendedStudentIds);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($absensi) {
            $delay = Carbon::parse($absensi->deadline_time)->diffInSeconds(now());
            MarkAbsentStudents::dispatch($absensi)->delay($delay);
        });
    }
}
