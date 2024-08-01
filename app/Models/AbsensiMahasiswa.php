<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'absensi_mahasiswas';

    protected $fillable = [
        'absensi_id', 'user_id', 'status'
    ];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);   
    }
}
