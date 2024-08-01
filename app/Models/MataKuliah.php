<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jurusan_id',
        'semester_id',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'mata_kuliah_user');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
