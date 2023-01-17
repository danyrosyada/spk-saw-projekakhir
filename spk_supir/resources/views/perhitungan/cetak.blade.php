<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Cetak Rangking</title>

</head>
<style>
    h1 {
        font-family: Nunito;
        font-size: 24px;
        font-style: normal;
        font-variant: normal;
        font-weight: 700;
        line-height: 26.4px;
    }

    h3 {
        font-family: Nunito;
        font-size: 14px;
        font-style: normal;
        font-variant: normal;
        font-weight: 700;
        line-height: 15.4px;
    }

    p {
        font-family: Nunito;
        font-size: 18px;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        line-height: 20px;
    }

    blockquote {
        font-family: Nunito;
        font-size: 21px;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        line-height: 30px;
    }

    pre {
        font-family: Nunito;
        font-size: 13px;
        font-style: normal;
        font-variant: normal;
        font-weight: 400;
        line-height: 18.5714px;
    }

    .center {
        margin-left: auto;
        margin-right: auto;
    }

    .table1 {
        font-family: sans-serif;
        color: #444;
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #f2f5f7;
    }
    .badge {
  background-color: #35A9DB;
  color: white;
  padding: 4px 8px;
  text-align: center;
  border-radius: 5px;
}
    .table1 tr th {
        background: #35A9DB;
        color: #fff;
        font-weight: normal;
    }

    .table1,
    th,
    td {
        padding: 8px 20px;
        text-align: center;
    }

    .table1 tr:hover {
        background-color: #f5f5f5;
    }

    .table1 tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<body>
    <div class="container">
        <div class="col">
            <center>
                <h1><b>Daftar Rangking Supir
                    </b></h1>
                <h2><b>Pada Penilaian {{ $periode->judul }}</b></h2>
            </center>
            <hr><br>
            <div class="table">
                <table class="table1 center responsive">
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
                <div class="badge">
                <h1>Hasil perhitungan Sistem Pendukung Keputusan metode SAW pada Tahap Penilaian
                    {{ $periode->judul }}, </h1>
                </div>
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
                <h1 class="badge">Dapat disimpulkan, </h1>
                <p>Calon <b>{{ $rekomendasi[0] ? $rekomendasi[0]->nama : '' }} </b> dan
                    <b>{{ $rekomendasi[1] ? $rekomendasi[1]->nama : '' }} </b> dapat dijadikan alternatif
                    pemilihan
                    calon supir atau direkomendasikan berdasarkan hasil dari perhitungan.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
