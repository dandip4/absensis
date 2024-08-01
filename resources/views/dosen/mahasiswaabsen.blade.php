@extends('dosen.layouts.main')

@section('title', 'Mahasiswa')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Attendance Record</h4>
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
                        <a href="#">Attendance Record</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Attendance Record</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('dosen.absensi.mahasiswa') }}">
                                <div class="form-group row">
                                    @if($mataKuliahs->count() > 1)
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <label for="week_id">Pilih Minggu:</label>
                                        <select name="week_id" id="week_id" class="form-control">
                                            <option value="">-- Pilih Minggu --</option>
                                            @foreach($weeks as $week)
                                                <option value="{{ $week->id }}" {{ $selectedWeek == $week->id ? 'selected' : '' }}>
                                                    {{ $week->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tampilkan Mahasiswa</button>
                                    @if(!empty($selectedMataKuliah) && !empty($selectedKelas) && !empty($selectedWeek))
                                        <a href="{{ route('dosen.absensi.export', ['mata_kuliah_id' => $selectedMataKuliah, 'kelas_id' => $selectedKelas, 'week_id' => $selectedWeek]) }}" class="btn btn-success">Download Record Absensi</a>
                                    @endif
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="col-1 text-center">No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>NPM</th>
                                            <th>Status Kehadiran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($absensis as $absensi)
                                            @foreach ($absensi->users as $data)
                                            <tr>
                                                <td class="col-1 text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->npm }}</td>
                                                <td>{{ $data->pivot->status }}</td>
                                            </tr>
                                            @endforeach
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
    });
</script>
@endpush

@endsection
