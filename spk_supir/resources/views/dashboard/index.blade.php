@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                            {{ $users ?? '0' }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Periode</h4>
                        </div>
                        <div class="card-body">
                            {{ $periode ?? '0' }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kriteria</h4>
                        </div>
                        <div class="card-body">
                            {{ $kriteria ?? '0' }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-truck  fa-flip-horizontal"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Supir</h4>
                        </div>
                        <div class="card-body">
                            {{ $supir ?? '0' }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Sistem Pendukung Keputusan</h4>
            </div>
            <div class="card-body">
                <p>
                    <b>
                        <h5> Sistem pendukung keputusan penerimaan supir menggunakan metode simple additive weighting </h5>
                        adalah sebuah
                        sistem yang dapat membantu pemilik dalam menentukan penerimaan supir yang layak atau mencari supir
                        yang
                        sesuai dengan kriteria yang ditentukan.
                    </b>
                </p>
                <p>
                    <b>
                        Metode simple additive weighting ini membantu dalam menghitung bobot dari setiap kriteria yang telah
                        ditentukan,
                        sehingga dapat memberikan nilai total bagi setiap
                        calon supir yang melamar. Data tersebut dijadikan perangkingan sehingga pemilik dapat dengan mudah
                        memilih calon supir yang
                        paling
                        sesuai dengan kriteria yang ditetapkan.
                    </b>
                </p>
            </div>
        </div>
    </section>
@endSection
