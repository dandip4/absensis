@extends('dosen.layouts.main')

@section('title', 'Mahasiswa')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Mahasiswa</h4>
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
                        <a href="#">Mahasiswa</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Mahasiswa</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('dosen.mahasiswa') }}">
                                <div class="form-group row">
                                    @if($mataKuliahs->count() > 1)
                                    <div class="col-md-6">
                                        <label for="mata_kuliah_id">Pilih Mata Kuliah:</label>
                                        <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-control">
                                            <option value="">-- Pilih Mata Kuliah --</option>
                                            @foreach($mataKuliahs as $mataKuliah)
                                                <option value="{{ $mataKuliah->id }}" {{ $selectedMataKuliah == $mataKuliah->id ? 'selected' : '' }}>
                                                    {{ $mataKuliah->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="mata_kuliah_id" value="{{ $mataKuliahs->first()->id }}">
                                @endif
                                    <div class="col-md-6">
                                        <label for="kelas_id">Pilih Kelas:</label>
                                        <select name="kelas_id" id="kelas_id" class="form-control">
                                            <option value="">-- Pilih Kelas --</option>
                                            @foreach($kelases as $kelas)
                                                <option value="{{ $kelas->id }}" {{ $selectedKelas == $kelas->id ? 'selected' : '' }}>
                                                    {{ $kelas->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tampilkan Mahasiswa</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="col-1 text-center">No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>NPM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswas as $data)
                                        <tr>
                                            <td class="col-1 text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->npm }}</td>
                                        </tr>
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
        $('#basic-datatables').DataTable();

        $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
                });
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function () {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');
        });
    });
</script>
@endpush

@endsection
