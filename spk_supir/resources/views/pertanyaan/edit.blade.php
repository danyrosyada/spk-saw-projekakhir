@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
                <h1>Edit Tes {{ $pertanyaan->soal }}</h1>
                <a href="/kriteria/{{ $pertanyaan->kriteria_id }}" class="btn btn-warning float-right">Kembali</a>
            </div>
        </div>
        <div class="section-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade" role="alert">
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
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Soal Tes {{ $pertanyaan->soal }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="/kriteria/{{ $kriteria->id }}/pertanyaan/{{ $pertanyaan->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" value="{{ $kriteria->id }}" name="kriteria_id">
                                    <input type="hidden" value="{{ $kriteria->bobot }}" name="bobot_kriteria">
                                    <label for="soal">Soal</label>
                                    <input id="soal" type="text"
                                        class="form-control rounded-top @error('soal') is-invalid @enderror" name="soal"
                                        value="{{ old('soal', $pertanyaan->soal) }}">
                                    @error('soal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                        <label for="bobot">Bobot Soal</label>
                                        <input class="form-control rounded-top @error('bobot') is-invalid @enderror"
                                            name="bobot" value="{{ old('bobot') }}" type="number">
                                        @error('bobot')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Update
                                    </button>
                                    <a
                                        href="/kriteria/{{ $pertanyaan->kriteria_id }}"class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
