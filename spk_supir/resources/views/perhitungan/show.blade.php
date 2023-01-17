@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
                <h1>Data Rangking {{ $periode->judul }}</h1>
                <a href="/perhitungan" class="btn btn-warning float-right">Kembali</a>
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
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Perangkingan</h4>
                </div>
                <div class="card-body">
                    <a href="/perhitungan/tahap/{{ $periode->id_periode }}" class="btn btn-primary">Tahap Perhitungan
                        SAW</a>
                    <a href="/perhitungan/cetak/{{ $periode->id_periode }}" class="btn btn-icon icon-left btn-success">Cetak Rangking
                    </a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table id="tb_rangking" class="table table-bordered table-striped-columns table-hover">
                            <thead>
                                <tr>
                                    <th>Supir</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>

                                    <th>Total Nilai</th>
                                    <th>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($supir as $alt => $valt)
                                    <tr>
                                        <td>{{ $valt->nama }}</td>
                                        <td>{{ $valt->alamat }}</td>
                                        <td>{{ $valt->hp }}</td>
                                        <td>{{ $total[$alt] }}</td>
                                        <td>{{ $rank[$alt] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td> Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        <h5>Hasil perhitungan Sistem Pendukung Keputusan metode SAW pada Tahap Penilaian
                            {{ $periode->judul }}, </h5>
                        <p> Skor akhir diatas diurutkan dari yang terbesar ke terkecil, yang mana alternatif solusi
                            dengan
                            skor
                            terbesar lebih diutamakan untuk diterima mejadi supir. Dapat diketahui
                            <b>{{ $rekomendasi[0] ? $rekomendasi[0]->nama : '' }}</b> memiliki
                            skor tertinggi sehingga mendapat peringkat pertama dan lebih diutamakan untuk diterima
                            menjadi
                            supir, lalu di peringkat ke dua ada
                            <b>{{ $rekomendasi[1] ? $rekomendasi[1]->nama : '' }}</b>
                        </p>
                        <h5>Dapat disimpulkan, </h5>
                        <p>Calon <b>{{ $rekomendasi[0] ? $rekomendasi[0]->nama : '' }} </b> dan
                            <b>{{ $rekomendasi[1] ? $rekomendasi[1]->nama : '' }} </b> dapat dijadikan alternatif
                            pemilihan
                            calon supir atau direkomendasikan berdasarkan hasil dari perhitungan.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#tb_analisa').DataTable();
            $('#tb_normalisasi').DataTable();
            $('#tb_rangking').DataTable();
        });
    </script>
@stop
