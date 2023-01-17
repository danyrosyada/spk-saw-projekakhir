@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Supir</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Data Supir</h4>
                        </div>
                        <div class="card-body">
                            <form action="/supir" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input id="nama" type="text"
                                        class="form-control rounded-top @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ old('nama') }}" autofocus>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lahir">Tempat Lahir</label>
                                    <input id="lahir" type="text"
                                        class="form-control rounded-top @error('lahir') is-invalid @enderror" name="lahir"
                                        value="{{ old('lahir') }}">
                                    @error('lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input name="tgl_lahir" id="tgl_lahir" class="form-control"
                                        onchange="invoicedue(event);"required value="1980-01-01" type="date">
                                    @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input id="alamat" type="text"
                                        class="form-control rounded-top @error('alamat') is-invalid @enderror"
                                        name="alamat" value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>No. Handphone</label>
                                    <input id="hp" type="text"
                                        class="form-control rounded-top @error('hp') is-invalid @enderror" name="hp"
                                        value="{{ old('hp') }}" autofocus>
                                    @error('hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan
                                    </button>
                                    <a href="/supir"class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
