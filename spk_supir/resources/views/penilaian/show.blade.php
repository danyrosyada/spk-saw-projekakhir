@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
                <h1>Data Detail Penilaian</h1>
                <a href="/penilaian" class="btn btn-warning float-right">Kembali</a>
            </div>
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
        <div class="card card-primary">
            <div class="card-header">
                <h4>Detail Penilaian {{ $periode->judul }}</h4>
            </div>
            <div class="card-body">
                @if ($periode->status == 1)
                    <div class="alert alert-success" role="alert">
                        <div class="col">
                            Penilaian {{ $periode->judul }} Sedang Dibuka
                            <form action="/penilaian/{{ $periode->id_periode }}/tutup" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger float-right"
                                    onclick="return confirm('Apa yakin akan menutup periode penilaian ini? ?')">Tutup
                                    Periode
                                    Penilaian</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        Penilaian {{ $periode->judul }} Telah Di tutup
                    </div>
                @endif
                <table id="DataTable" class="table table-bordered table-striped-columns table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">SUPIR</th>
                            <th scope="col">PERIODE</th>
                            <th scope="col">NILAI</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penilaian as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->supir ? $value->supir->nama : '' }}</td>
                                <td>{{ $value->periode ? $value->periode->judul : '' }}</td>
                                <td>{{ $value->total_score }}</td>
                                <td><a href="/penilaian/detail/{{ $value->id_penilaian }}"
                                        class="btn btn-sm btn-success">Detail</a>
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
