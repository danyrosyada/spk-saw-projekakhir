@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Penilaian</h1>
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
                        <i class="fas fa-times-circle"></i>
                        {{ session('gagal') }}
                    </div>
            @endif
        </div>
        <a class="btn btn-icon icon-left btn-primary" href="/penilaian/create" role="button">Tambah Penilaian</a>
        <br>
        <br>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Data Penilaian Berdasarkan Periode</h4>
            </div>
            <div class="card-body">
                <table id="DataTable" class="table table-bordered table-striped-columns table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">PERIODE</th>
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
                                <td><a href="/penilaian/{{ $value->id_periode }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#DataTable').DataTable();
        });
    </script>
@stop
