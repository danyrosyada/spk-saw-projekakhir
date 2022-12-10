@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
            <h1>Edit Jawaban {{ $pertanyaan->soal }}</h1>
            <a href="/kriteria/{{ $pertanyaan->kriteria_id }}/pertanyaan/{{ $pertanyaan->id }}" class="btn btn-warning float-right">Kembali</a>
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
                            <h4>Jawaban Tes {{ $pertanyaan->soal }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="/kriteria/{{ $kriteria->id }}/pertanyaan/{{ $pertanyaan->id }}/jawaban/{{ $jawaban->id }}"
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
                                    </select>
                                </div>
                                <div class="form-group">
                                    {{-- <input type="hidden" value="{{ $kriteria->id }}" name="kriteria_id">
                    <input type="hidden" value="{{ $kriteria->bobot }}" name="bobot_kriteria"> --}}
                                    <input type="hidden" value="{{ $pertanyaan->id }}" name="pertanyaan_id">
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
                                    <label for="point">Point</label>
                                    <input class="form-control rounded-top @error('point') is-invalid @enderror"
                                        name="point" value="{{ old('point', $jawaban->point) }}" type="number">
                                    @error('point')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Update
                                    </button>
                                    <a href="/kriteria/{{ $pertanyaan->kriteria_id }}/pertanyaan/{{ $pertanyaan->id }}"class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
