@extends('dosen.layouts.main')

@section('title', 'Tambah Absensi')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Absensi</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Absensi</a>
                    </li>
                </ul>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Absensi</h4>
                                <a href="{{ route('absensi.view') }}" class="btn btn-primary btn-round ml-auto">
                                    Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form name="form-create" id="form-create" action="{{ route('absensi.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                                @csrf
                                @php
                                    $user = auth()->user();
                                    $mataKuliahs = $user->mataKuliahs;
                                @endphp
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="mata_kuliah_id">Mata Kuliah</label>
                                            @if ($mataKuliahs->count() > 1)
                                                <select class="form-control select2" id="mata_kuliah_id" name="mata_kuliah_id" required>
                                                    @foreach($mataKuliahs as $mataKuliah)
                                                        <option value="{{ $mataKuliah->id }}">{{ $mataKuliah->nama }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <input type="hidden" name="mata_kuliah_id" value="{{ $mataKuliahs->first()->id }}">
                                                <input type="text" class="form-control" value="{{ $mataKuliahs->first()->nama }}" disabled>
                                            @endif
                                            <div class="invalid-feedback">Mata Kuliah wajib dipilih.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="kelas_id">Kelas</label>
                                            <select class="form-control select2" id="kelas_id" name="kelas_id" required>
                                                @foreach($kelas as $kls)
                                                    <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Kelas wajib dipilih.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="week_id">Week</label>
                                            <select class="form-control select2" id="week_id" name="week_id" required>
                                                @foreach($weeks as $week)
                                                    <option value="{{ $week->id }}">{{ $week->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Week wajib dipilih.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="start_time">Waktu Mulai Absen</label>
                                            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                                            <div class="invalid-feedback">Waktu Mulai Absen wajib diisi.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="deadline_time">Batas Waktu Absen</label>
                                            <input type="datetime-local" class="form-control" id="deadline_time" name="deadline_time" required>
                                            <div class="invalid-feedback">Batas Waktu Absen wajib diisi.</div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('style')
<link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/fontawesome/css/all.min.css') }}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/css/components.css') }}">
@endpush
@push('script')
<script src="{{ asset('stisla/dist/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/popper.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/js/stisla.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset('stisla/dist/assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('stisla/dist/assets/js/page/forms-advanced-forms.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('stisla/dist/assets/js/scripts.js') }}"></script>
<script src="{{ asset('stisla/dist/assets/js/custom.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#jurusan_id, #semester_id').change(function() {
            var jurusan_id = $('#jurusan_id').val();
            var semester_id = $('#semester_id').val();
            if (jurusan_id && semester_id) {
                $.ajax({
                    url: `/get-matakuliah/${jurusan_id}/${semester_id}`,
                    type: 'GET',
                    success: function(data) {
                        $('#mata_kuliah_ids').empty();
                        $.each(data, function(key, value) {
                            $('#mata_kuliah_ids').append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endpush
@endsection
