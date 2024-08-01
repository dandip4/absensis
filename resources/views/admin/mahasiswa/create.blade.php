@extends('admin.layouts.main')

@section('title', 'Tambah Mahasiswa')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Mahasiswa</h4>
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
                        <a href="#">Tambah Mahasiswa</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Mahasiswa</h4>
                                <a href="{{ route('mahasiswa.view') }}" class="btn btn-primary btn-round ml-auto">
                                    Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form name="form-create" id="form-create" action="{{ route('mahasiswa.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                                            <div class="invalid-feedback">
                                                Nama wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npm">NPM</label>
                                            <input type="text" name="npm" class="form-control" id="npm" placeholder="NPM" required>
                                            <div class="invalid-feedback">
                                                NPM wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                            <div class="invalid-feedback">
                                                Email wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                            <div class="invalid-feedback">
                                                Password wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jurusan_id">Jurusan</label>
                                            <select name="jurusan_id" id="jurusan_id" class="form-control select2" required>
                                                <option value="">Pilih Jurusan</option>
                                                @foreach($jurusan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Jurusan wajib dipilih.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="semester_id">Semester</label>
                                            <select name="semester_id" id="semester_id" class="form-control select2" required>
                                                <option value="">Pilih Semester</option>
                                                @foreach($semester as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Semester wajib dipilih.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kelas_id">Kelas</label>
                                            <select name="kelas_id" id="kelas_id" class="form-control select2" required>
                                                <option value="">Pilih Kelas</option>
                                                @foreach($kelas as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Kelas wajib dipilih.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mata_kuliah_ids">Mata Kuliah</label>
                                            <select name="mata_kuliah_ids[]" id="mata_kuliah_ids" class="form-control select2" multiple required>
                                                @foreach($mata_kuliahs as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Mata Kuliah wajib dipilih.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_telp">Nomor Telepon</label>
                                            <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor Telepon" required>
                                            <div class="invalid-feedback">
                                                Nomor Telepon wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                                            <div class="invalid-feedback">
                                                Alamat wajib diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="role" value="3" class="form-control" id="role">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
