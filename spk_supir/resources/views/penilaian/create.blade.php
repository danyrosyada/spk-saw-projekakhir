@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Buat Penilaian</h1>
        </div>
        <div class="section-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('success') }}
                    </div>
            @endif
            @if (session()->has('gagal'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('gagal') }}
                    </div>
            @endif
        </div>
        {{-- <a class="btn btn-icon icon-left btn-primary" href="/penilaian/create" role="button"><i
                class="fas fa-user-plus"></i>Buat Penilaian
            Data</a> --}}
        <br>
        <br>
        <div class="card card-primary">
            <div class="card-body">
                
            </div>
        </div>
    </section>
@endsection
