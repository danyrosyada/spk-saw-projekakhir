@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
                <h1>Edit Jawaban {{ $pertanyaan->soal }}</h1>
                <a href="/kriteria/{{ $pertanyaan->id_kriteria }}/pertanyaan/{{ $pertanyaan->id_pertanyaan }}"
                    class="btn btn-warning float-right">Kembali</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Jawaban Tes {{ $pertanyaan->soal }}</h4>
                        </div>
                        <div class="card-body">
                            <form
                                action="/kriteria/{{ $kriteria->id_kriteria }}/pertanyaan/{{ $pertanyaan->id_pertanyaan }}/jawaban/{{ $jawaban->id_jawaban }}"
                                method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="pg">Pilihan Ganda</label>
                                    <select class="form-control @error('pg') is-invalid @enderror"
                                        value="{{ old('pg', $jawaban->pg) }}" name="pg" id="pg">
                                        <option {{ $jawaban->pg == 'A' ? 'selected' : '' }} value="A">
                                            A
                                        </option>
                                        <option {{ $jawaban->pg == 'B' ? 'selected' : '' }} value="B">
                                            B
                                        </option>
                                        </option>
                                        <option {{ $jawaban->pg == 'C' ? 'selected' : '' }} value="C">
                                            C
                                        </option>
                                        <option {{ $jawaban->pg == 'D' ? 'selected' : '' }} value="D">
                                            D
                                        </option>
                                        <option {{ $jawaban->pg == 'E' ? 'selected' : '' }} value="E">
                                            E
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" value="{{ $pertanyaan->id_pertanyaan }}" name="id_pertanyaan">
                                    <label for="jawaban">Jawaban</label>
                                    <input id="jawaban" type="text"
                                        class="form-control rounded-top @error('jawaban') is-invalid @enderror"
                                        name="jawaban" value="{{ old('jawaban', $jawaban->jawaban) }}">
                                    @error('jawaban')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
                                    <input class="form-control rounded-top @error('bobot') is-invalid @enderror"
                                        name="bobot" value="{{ old('bobot', $jawaban->bobot) }}" type="number">
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
                                    <a
                                        href="/kriteria/{{ $pertanyaan->id_kriteria }}/pertanyaan/{{ $pertanyaan->id_pertanyaan }}"class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
