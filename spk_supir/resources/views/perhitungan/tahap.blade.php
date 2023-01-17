@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
                <h1>Perhitungan Saw {{ $periode->judul }}</h1>
                <a href="/perhitungan/{{ $periode->id_periode }}" class="btn btn-warning float-right">Kembali</a>
            </div>
        </div>
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tahap Analisa</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_analisa" class="table table-bordered table-striped-columns table-hover">
                            <thead>
                                <tr>
                                    <th> Nama Supir</th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($supir as $alt => $valt)
                                    <tr>
                                        <td>{{ $valt->nama }}</td>
                                        @foreach ($kriteria as $key => $value_kriteria)
                                            <td>{{ $score_by_criteria[$value_kriteria['nama_kriteria']][$alt] }}</td>
                                        @endforeach
                                    </tr>
                                @empty
                                    <tr>
                                        <td> Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tahap Normalisasi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_normalisasi" class="table table-bordered table-striped-columns table-hover">
                            <thead>
                                <tr>
                                    <th> Nama Supir</th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($supir as $alt => $valt)
                                    <tr>
                                        <td>{{ $valt->nama }}</td>
                                        @foreach ($kriteria as $key => $value_kriteria)
                                            <td>{{ $score_by_criteria2[$value_kriteria['nama_kriteria']][$alt] }}</td>
                                        @endforeach
                                    </tr>
                                @empty
                                    <tr>
                                        <td> Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tahap Perangkingan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_rangking" class="table table-bordered table-striped-columns table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Bobot
                                    </th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->bobot }}</th>
                                    @endforeach
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Supir</th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->nama_kriteria }}</th>
                                    @endforeach
                                    <th>Total</th>
                                    <th>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($supir as $alt => $valt)
                                    <tr>
                                        <td>{{ $valt->nama }}</td>
                                        @foreach ($kriteria as $key => $value_kriteria)
                                            {{-- menyimpan data nilai kriteria  --}}
                                            <td>{{ $score_by_criteria3[$value_kriteria['nama_kriteria']][$alt] }}</td>
                                        @endforeach
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
