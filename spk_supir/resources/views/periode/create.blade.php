@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Periode</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Periode</h4>
                        </div>
                        <div class="card-body">
                            <form action="/periode" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input id="judul" type="text"
                                        class="form-control rounded-top @error('judul') is-invalid @enderror" name="judul"
                                        value="{{ old('judul') }}" autofocus>
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <input id="ket" type="text"
                                        class="form-control rounded-top @error('ket') is-invalid @enderror" name="ket"
                                        value="{{ old('ket') }}">
                                    @error('ket')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan
                                    </button>
                                    <a href="/periode"class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
