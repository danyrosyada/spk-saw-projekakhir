@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Supir</h1>
        </div>
        <div class="section-body">
            <section class="section">
                <div class="row mt-5">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-3 col-lg-8 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Supir</h4>
                            </div>
                            <div class="card-body">
                                <form action="/supir" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Periode</label>
                                        <select class="form-control @error('periode_id') is-invalid @enderror"
                                            value="{{ old('periode_id') }}" name="periode_id" id="periode_id">
                                            @foreach ($periode as $p)
                                                <option value="{{ $p->id_periode }}">{{ $p->id_periode }} |
                                                    {{ $p->judul }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('periode_id'))
                                            <p class="help-block error">{{ $errors->first('periode_id') }}</p>
                                        @endif
                                        @error('periode_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input id="nama" type="text"
                                            class="form-control rounded-top @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ old('nama') }}" autofocus>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="lahir">Tempat Lahir</label>
                                        <input id="lahir" type="text"
                                            class="form-control rounded-top @error('lahir') is-invalid @enderror"
                                            name="lahir" value="{{ old('lahir') }}">
                                        @error('lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input name="tgl_lahir" id="tgl_lahir" class="form-control"
                                            onchange="invoicedue(event);"required value="2022-12-04" type="date">
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
                                            class="form-control rounded-top @error('hp') is-invalid @enderror"
                                            name="hp" value="{{ old('hp') }}" autofocus>
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endSection
