@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Buat Kriteria</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Kriteria</h4>
                        </div>
                        <div class="card-body">
                            <form action="/kriteria" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_kriteria">Nama Kriteria</label>
                                    <input id="nama_kriteria" type="text"
                                        class="form-control rounded-top @error('nama_kriteria') is-invalid @enderror"
                                        name="nama_kriteria" value="{{ old('nama_kriteria') }}">
                                    @error('nama_kriteria')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_kriteria">Jenis Kriteria</label>
                                    <select class="form-control @error('attribut') is-invalid @enderror"
                                        value="{{ old('jenis') }}" name="jenis" id="jenis">
                                        <option value="Crips">Crips</option>
                                        <option value="Pertanyaan">Pertanyaan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kriteria">Attribut Kriteria</label>
                                    <select class="form-control @error('attribut') is-invalid @enderror"
                                        value="{{ old('attribut') }}" name="attribut" id="attribut">
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot Kriteria</label>
                                    <input class="form-control rounded-top @error('bobot') is-invalid @enderror"
                                        name="bobot" value="{{ old('bobot') }}" type="number">
                                    @error('bobot')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan
                                    </button>
                                    <a href="/kriteria"class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
