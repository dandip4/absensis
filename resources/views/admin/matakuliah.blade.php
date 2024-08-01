@extends('admin.layouts.main')

@section('title', 'Data Mata Kuliah')

@section('main')
@if(session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('status') }}',
                timer: 2100,
                timerProgressBar: true,
                showConfirmButton: true,
            });
        });
    </script>
@endif
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Mata Kuliah</h4>
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
                        <a href="#">Mata Kuliah</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Mata Kuliah</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Tambah Mata Kuliah
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">Tambah</span>
                                                <span class="fw-light">Mata Kuliah</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('matakuliah.simpan') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Mata Kuliah</label>
                                                            <input id="nama" name="nama" type="text" class="form-control" placeholder="Masukkan Nama Mata Kuliah" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Jurusan</label>
                                                            <select name="jurusan_id" class="form-control" required>
                                                                @foreach($jurusan as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Semester</label>
                                                            <select name="semester_id" class="form-control" required>
                                                                @foreach($semester as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="col-1 text-center">No</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Jurusan</th>
                                            <th>Semester</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listdata as $matakuliah)
                                        <tr>
                                            <td class="col-1 text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $matakuliah->nama }}</td>
                                            <td>{{ $matakuliah->jurusan->nama }}</td>
                                            <td>{{ $matakuliah->semester->nama }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#editRowModal{{ $matakuliah->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link btn-danger" onclick="confirmDelete({{ $matakuliah->id }})">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $matakuliah->id }}" action="{{ route('matakuliah.delete', $matakuliah->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editRowModal{{ $matakuliah->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header no-bd">
                                                        <h5 class="modal-title">
                                                            <span class="fw-mediumbold">Edit</span>
                                                            <span class="fw-light">Mata Kuliah</span>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('matakuliah.simpan') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $matakuliah->id }}">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Nama Mata Kuliah</label>
                                                                        <input name="nama" type="text" class="form-control" value="{{ $matakuliah->nama }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Jurusan</label>
                                                                        <select name="jurusan_id" class="form-control" required>
                                                                            @foreach($jurusan as $item)
                                                                                <option value="{{ $item->id }}" {{ $matakuliah->jurusan_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Semester</label>
                                                                        <select name="semester_id" class="form-control" required>
                                                                            @foreach($semester as $item)
                                                                                <option value="{{ $item->id }}" {{ $matakuliah->semester_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer no-bd">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function() {
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#nama").val(),
                action
            ]);
            $('#addRowModal').modal('hide');
        });
    });
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush

@endsection
