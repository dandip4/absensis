<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jurusan
        DB::table('jurusans')->insert([
            ['nama' => 'Teknik Informatika', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sistem Informasi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Teknik Elektro', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Teknik Industri', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Kelas
        DB::table('kelas')->insert([
            ['nama' => 'Kelas A', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kelas B', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kelas C', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Semesters
        DB::table('semesters')->insert([
            ['nama' => 'Semester Ganjil', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Semester Genap', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Mata Kuliah
        DB::table('mata_kuliahs')->insert([
            ['nama' => 'Pemrograman Web', 'jurusan_id' => 1, 'semester_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Basis Data', 'jurusan_id' => 2, 'semester_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Jaringan Komputer', 'jurusan_id' => 1, 'semester_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sistem Operasi', 'jurusan_id' => 3, 'semester_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Users
        DB::table('users')->insert([
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'npm' => null,
                'semester_id' => null,
                'jurusan_id' => null,
                'kelas_id' => null,
                'nidn' => null,
                'bidang_keahlian' => null,
                'jabatan' => null,
                'no_telp' => null,
                'alamat' => null,
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Mahasiswa 1',
                'email' => 'mahasiswa1@gmail.com',
                'password' => Hash::make('123'),
                'npm' => '123456789',
                'semester_id' => 1,
                'jurusan_id' => 1,
                'kelas_id' => 1,
                'nidn' => null,
                'bidang_keahlian' => null,
                'jabatan' => null,
                'no_telp' => null,
                'alamat' => null,
                'role' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dosen 1',
                'email' => 'dosen1@gmail.com',
                'password' => Hash::make('123'),
                'npm' => null,
                'semester_id' => null,
                'jurusan_id' => null,
                'kelas_id' => null,
                'nidn' => '987654321',
                'bidang_keahlian' => 'Artificial Intelligence',
                'jabatan' => 'Dosen',
                'no_telp' => '012-345-6789',
                'alamat' => 'Jl. Dosen No. 1',
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Mata Kuliah user
        DB::table('mata_kuliah_user')->insert([
            ['user_id' => 2, 'mata_kuliah_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'mata_kuliah_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'mata_kuliah_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'mata_kuliah_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Weeks
        DB::table('weeks')->insert([
            ['nama' => 'Week 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Week 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Week 3', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Absensis
        DB::table('absensis')->insert([
            [
                'mata_kuliah_id' => 1,
                'kelas_id' => 1,
                'week_id' => 1,
                'user_id' => 3,
                'start_time' => now(),
                'deadline_time' => now()->addDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mata_kuliah_id' => 2,
                'kelas_id' => 2,
                'week_id' => 2,
                'user_id' => 2,
                'start_time' => now(),
                'deadline_time' => now()->addDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Absensi Mahasiswas
        DB::table('absensi_mahasiswas')->insert([
            [
                'absensi_id' => 1,
                'user_id' => 1,
                'status' => 'hadir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'absensi_id' => 2,
                'user_id' => 2,
                'status' => 'izin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
