@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Perhitungan</h1>
        </div>
        <div class="section-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
            @endif
            @if (session()->has('gagal'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ session('gagal') }}
                    </div>
            @endif
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Data Perhitungan Berdasarkan Periode</h4>
            </div>
            <div class="card-body">
                <table id="DataTable" class="table table-bordered table-striped-columns table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">JUDUL</th>
                            <th scope="col">KETERANGAN</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">JUMLAH PENILAIAN</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periode as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->judul }}</td>
                                <td>{{ $value->ket }}</td>
                                <td>
                                    <div class="badge {{ $value->status == '1' ? 'badge-success' : 'badge-danger' }}">
                                        {{ $value->status == 1 ? 'Dibuka' : 'Ditutup' }}</div>
                                </td>
                                <td>{{ count($value->penilaian) }}</td>
                                <td><a href="/perhitungan/{{ $value->id_periode }}" class="btn btn-sm btn-info">
                                        {{-- <i class="fa fa-eye"></i> --}}
                                    Rangking
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </section>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#DataTable').DataTable();
        });
    </script>
@stop
