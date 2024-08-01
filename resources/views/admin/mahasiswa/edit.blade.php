@extends('admin.layouts.main')

@section('title', 'Edit Mahasiswa')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Mahasiswa</h4>
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
                        <a href="#">Edit Mahasiswa</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <form name="form-edit" id="form-edit" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Nama">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="Nama" value="{{ $mahasiswa->nama }}" required>
                                            <div class="invalid-feedback">
                                                Nama wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npm">NPM</label>
                                            <input type="text" name="npm" class="form-control" id="npm" value="{{ $mahasiswa->npm }}" required>
                                            <div class="invalid-feedback">
                                                NPM wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email2">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="email2" value="{{ $mahasiswa->email }}" required>
                                            <div class="invalid-feedback">
                                                Email wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jurusan">Jurusan</label>
                                            <select name="jurusan_id" id="jurusan" class="form-control select2" required>
                                                <option value="" disabled>Select Jurusan</option>
                                                @foreach($jurusan as $j)
                                                    <option value="{{ $j->id }}" {{ $mahasiswa->jurusan_id == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Jurusan wajib dipilih.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="semester">Semester</label>
                                            <select name="semester_id" id="semester" class="form-control select2" required>
                                                <option value="" disabled>Select Semester</option>
                                                @foreach($semester as $s)
                                                    <option value="{{ $s->id }}" {{ $mahasiswa->semester_id == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Semester wajib dipilih.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kelas">Kelas</label>
                                            <select name="kelas_id" id="kelas" class="form-control select2" required>
                                                <option value="" disabled>Select Kelas</option>
                                                @foreach($kelas as $k)
                                                    <option value="{{ $k->id }}" {{ $mahasiswa->kelas_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Kelas wajib dipilih.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mata_kuliah_ids">Matakuliah</label>
                                            <select name="mata_kuliah_ids[]" id="mata_kuliah_ids" class="form-control select2" multiple required>
                                                @foreach($mata_kuliahs as $mk)
                                                    <option value="{{ $mk->id }}" {{ in_array($mk->id, $mahasiswa->mataKuliahs->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $mk->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Matakuliah wajib dipilih.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_telp">Nomor Telepon</label>
                                            <input type="text" name="no_telp" class="form-control" id="no_telp" value="{{ $mahasiswa->no_telp }}" required>
                                            <div class="invalid-feedback">
                                                Nomor Telepon wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $mahasiswa->alamat }}" required>
                                            <div class="invalid-feedback">
                                                Alamat wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update Mahasiswa</button>
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
        $('.select2').select2();

        $('#jurusan, #semester').change(function() {
            var jurusan_id = $('#jurusan').val();
            var semester_id = $('#semester').val();

            if(jurusan_id && semester_id) {
                $.ajax({
                    url: '/get-mata-kuliah/' + jurusan_id + '/' + semester_id,
                    type: 'GET',
                    success: function(response) {
                        $('#mata_kuliah_ids').empty();
                        $.each(response, function(key, value) {
                            $('#mata_kuliah_ids').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endpush
@endsection
