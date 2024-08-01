<?php

use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterMahasiswaController;
use App\Http\Controllers\Auth\RegisterDosenController;
use App\Http\Controllers\Auth\RegisterAdminController;
use App\Http\Controllers\Dosen\MasterdosenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\Mahasiswa\MastermahasiswaController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/dashboard', [MasterController::class, 'dashboard'])->name('dashboard');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    // regist admin
    Route::get('/register', [RegisterAdminController::class, 'index'])->name('register');
    Route::post('/register', [RegisterAdminController::class, 'register'])->name('register.post');
});


Route::middleware(['auth'])->group(function () {

    // Admin
    Route::middleware('is.role:1')->group(function () {
        Route::get('admin/dashboard', [MasterController::class, 'index'])->name('admin.dashboard');

        // regist mahasiswa
        Route::get('/register/mahasiswa', [RegisterMahasiswaController::class, 'index'])->name('mahaRegist');
        Route::post('/register/mahasiswa', [RegisterMahasiswaController::class, 'register'])->name('mahaRegist.post');

        // regist dosen
        Route::get('/register/dosen', [RegisterDosenController::class, 'index'])->name('dosenRegist');
        Route::post('/register/dosen', [RegisterDosenController::class, 'register'])->name('dosenRegist.post');

        Route::get('/mahasiswa/view', [UsersController::class, 'viewMahasiswa'])->name('mahasiswa.view');
        Route::get('/mahasiswa/create', [UsersController::class, 'createMahasiswa'])->name('mahasiswa.create');
        Route::post('/mahasiswa/store', [UsersController::class, 'storeMahasiswa'])->name('mahasiswa.store');
        Route::get('/mahasiswa/{id}/edit', [UsersController::class, 'editMahasiswa'])->name('mahasiswa.edit');
        Route::put('/mahasiswa/{id}', [UsersController::class, 'updateMahasiswa'])->name('mahasiswa.update');
        Route::delete('/mahasiswa/{id}', [UsersController::class, 'deleteMahasiswa'])->name('mahasiswa.delete');
        Route::get('/get-matakuliah/{jurusan_id}/{semester_id}', [UsersController::class, 'getMataKuliah']);

        Route::get('/dosen/view', [UsersController::class, 'viewDosen'])->name('dosen.view');
        Route::get('/dosen/create', [UsersController::class, 'createDosen'])->name('dosen.create');
        Route::post('/dosen/store', [UsersController::class, 'storeDosen'])->name('dosen.store');
        Route::get('/dosen/{id}/edit', [UsersController::class, 'editDosen'])->name('dosen.edit');
        Route::put('/dosen/{id}', [UsersController::class, 'updateDosen'])->name('dosen.update');
        Route::delete('/dosen/{id}', [UsersController::class, 'deleteDosen'])->name('dosen.delete');


        Route::controller(MasterController::class)->group(function () {

        Route::get('/kelas/view', 'viewKelas')->name('kelas.view');
        Route::post('/kelas/simpan', 'simpanKelas')->name('kelas.simpan');
        Route::delete('/kelas/delete/{id}', 'deleteKelas')->name('kelas.delete');

        Route::get('/jurusan/view', 'viewJurusan')->name('jurusan.view');
        Route::post('/jurusan/simpan', 'simpanJurusan')->name('jurusan.simpan');
        Route::delete('/jurusan/delete/{id}', 'deleteJurusan')->name('jurusan.delete');

        Route::get('/semester/view', 'viewSemester')->name('semester.view');
        Route::post('/semester/simpan', 'simpanSemester')->name('semester.simpan');
        Route::delete('/semester/delete/{id}', 'deleteSemester')->name('semester.delete');

        Route::get('/matakuliah/view', 'viewMatakuliah')->name('matakuliah.view');
        Route::post('/matakuliah/simpan', 'simpanMatakuliah')->name('matakuliah.simpan');
        Route::delete('/matakuliah/delete/{id}', 'deleteMatakuliah')->name('matakuliah.delete');

     });
    });

    // Dosen
    Route::middleware('is.role:2')->group(function () {
        Route::controller(MasterdosenController::class)->group(function () {
            Route::get('dosen/dashboard',  'index')->name('dosen.dashboard');

            Route::get('dosen/mahasiswa',  'viewMahasiswa')->name('dosen.mahasiswa');

            Route::get('/week/view', 'viewWeek')->name('week.view');
            Route::post('/week/simpan', 'simpanWeek')->name('week.simpan');
            Route::delete('/week/delete/{id}', 'deleteWeek')->name('week.delete');

            Route::get('absensi/view', 'indexAbsen')->name('absensi.view');
            Route::get('/absensi/create', 'createAbsen')->name('absensi.create');
            Route::post('/absensi/store', 'storeAbsen')->name('absensi.store');
            Route::get('/absensi/{id}/edit', 'editAbsen')->name('absensi.edit');
            Route::put('/absensi/{id}', 'updateAbsen')->name('absensi.update');
            Route::delete('/absensi/{id}','deleteAbsen')->name('absensi.delete');

            Route::get('dosen/absensi_mahasiswa', 'viewAbsensiMahasiswa')->name('dosen.absensi.mahasiswa');
            Route::post('dosen/absensi_mahasiswa', 'viewAbsensiMahasiswa');

            Route::get('/export-absensi', 'exportAbsensi')->name('dosen.absensi.export');



        });
    });

    // Mahasiswa
    Route::middleware('is.role:3')->group(function () {
        Route::get('/mahasiswa/absensi', [MastermahasiswaController::class, 'index'])->name('mahasiswa.absensi.index');
        Route::get('/mahasiswa/absensi/{mataKuliah}/weeks', [MastermahasiswaController::class, 'showWeeks'])->name('mahasiswa.absensi.weeks');
        Route::get('/mahasiswa/absensi/{mataKuliah}/weeks/{week}', [MastermahasiswaController::class, 'showAbsenForm'])->name('mahasiswa.absensi.form');
        Route::post('/mahasiswa/absensi/{mataKuliah}/weeks/{week}/store', [MastermahasiswaController::class, 'storeAbsen'])->name('mahasiswa.absensi.store');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
