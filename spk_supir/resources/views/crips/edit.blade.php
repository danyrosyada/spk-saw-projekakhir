@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah data Crips {{ $crips->nama_crips }}</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Ubah Crips</h4>
                        </div>
                        <div class="card-body">
                            <form action="/crips/{{ $crips->id_crips }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" value="{{ $crips->id_kriteria }}" name="id_kriteria">
                                    <label for="nama_crips">Nama Crips</label>
                                    <input id="nama_crips" type="text"
                                        class="form-control rounded-top @error('nama_crips') is-invalid @enderror"
                                        name="nama_crips" value="{{ old('nama_crips', $crips->nama_crips) }}">
                                    @error('nama_crips')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot Crips</label>
                                    <input class="form-control rounded-top @error('bobot') is-invalid @enderror"
                                        name="bobot" value="{{ old('bobot', $crips->bobot) }}" type="number">
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
                                    <a href="{{ url()->previous() }}" class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
