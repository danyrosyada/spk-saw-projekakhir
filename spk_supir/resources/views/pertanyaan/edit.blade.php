@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
                <h1>Edit Pertanyaan {{ $pertanyaan->soal }}</h1>
                <a href="/kriteria/{{ $pertanyaan->id_kriteria }}" class="btn btn-warning float-right">Kembali</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Pertanyaan {{ $pertanyaan->soal }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="/kriteria/{{ $kriteria->id_kriteria }}/pertanyaan/{{ $pertanyaan->id_pertanyaan }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" value="{{ $kriteria->id_kriteria }}" name="id_kriteria">
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
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Update
                                    </button>
                                    <a
                                        href="/kriteria/{{ $pertanyaan->id_kriteria }}"class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
