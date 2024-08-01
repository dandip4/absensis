<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'npm',
        'jurusan_id',
        'semester_id',
        'kelas_id',
        'nidn',
        'bidang_keahlian',
        'jabatan',
        'no_telp',
        'alamat',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function mataKuliahs()
    {
        return $this->belongsToMany(MataKuliah::class, 'mata_kuliah_user');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function absensis()
    {
        return $this->belongsToMany(Absensi::class, 'absensi_mahasiswas')->withPivot('status');
    }

    public function absensiMahasiswas()
    {
        return $this->hasMany(AbsensiMahasiswa::class);
    }
}
