@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Kriteria</h1>
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
                            <h4>Edit Kriteria {{ $kriteria->nama_kriteria }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="/kriteria/{{ $kriteria->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="nama_kriteria">Nama Kriteria</label>
                                    <input id="nama_kriteria" type="text"
                                        class="form-control rounded-top @error('nama_kriteria') is-invalid @enderror"
                                        name="nama_kriteria" value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}">
                                    @error('nama_kriteria')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_kriteria">Jenis Kriteria</label>
                                    <select class="form-control @error('jenis') is-invalid @enderror" name="jenis"
                                        id="jenis" disabled>
                                        <option {{ $kriteria->jenis == 'Crips' ? 'selected' : '' }} value="Crips">
                                            Crips
                                        </option>
                                        <option {{ $kriteria->jenis == 'Pertanyaan' ? 'selected' : '' }} value="Pertanyaan">
                                            Pertanyaan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kriteria">Attribut Kriteria</label>
                                    <select class="form-control @error('attribut') is-invalid @enderror" name="attribut"
                                        id="attribut">
                                        <option {{ $kriteria->attribut == 'Benefit' ? 'selected' : '' }} value="Benefit">
                                            Benefit
                                        </option>
                                        <option {{ $kriteria->attribut == 'Cost' ? 'selected' : '' }} value="Cost">Cost
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot Kriteria</label>
                                    <input class="form-control rounded-top @error('bobot') is-invalid @enderror"
                                        name="bobot" value="{{ old('bobot', $kriteria->bobot) }}" type="number">
                                    @error('bobot')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Update
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
