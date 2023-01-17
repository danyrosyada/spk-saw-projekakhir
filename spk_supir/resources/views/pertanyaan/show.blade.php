@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
                <h1>Data {{ $kriteria->jenis == 'Pertanyaan' ? '' : 'Crips' }} Jawaban {{ $kriteria->nama_kriteria }}</h1>
                {{-- <a href="/kriteria/{{ $kriteria->id_pertanyaan }}" class="btn btn-warning float-right">Kembali</a> --}}
            </div>
        </div>
        <div class="section-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
            @endif
            @if (session()->has('gagal'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        <i class="fas fa-times-circle"></i>
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
                            <form
                                action="/kriteria/{{ $kriteria->id_kriteria }}/pertanyaan/{{ $pertanyaan->id_pertanyaan }}/jawaban"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="pg">Pilihan Ganda</label>
                                    <select class="form-control @error('pg') is-invalid @enderror"
                                        value="{{ old('pg') }}" name="pg" id="pg">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" value="{{ $pertanyaan->id_pertanyaan }}" name="id_pertanyaan">
                                    <input type="hidden" value="{{ $kriteria->id_kriteria }}" name="id_kriteria">
                                    <label for="jawaban">Jawaban</label>
                                    <input id="jawaban" type="text"
                                        class="form-control rounded-top @error('jawaban') is-invalid @enderror"
                                        name="jawaban" value="{{ old('jawaban') }}">
                                    @error('jawaban')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
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
                                    <a
                                        href="/kriteria/{{ $pertanyaan->id_kriteria }}/pertanyaan/{{ $pertanyaan->id_pertanyaan }}"class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>List Jawaban {{ $pertanyaan->soal }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="col">
                                <table id="Jawaban" class="table table-striped-columns table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pilihan Ganda</th>
                                            <th scope="col">Soal Tes</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jawaban as $j)
                                            <tr>
                                                <td>{{ $j->pg }}</td>
                                                <td>{{ $j->jawaban }}</td>
                                                <td>{{ $j->bobot }}</td>
                                                <td>
                                                    {{-- <a href="/pertanyaan/{{ $j->id }}" class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i></a> --}}
                                                    <a href="/kriteria/{{ $kriteria->id_kriteria }}/pertanyaan/{{ $j->id_pertanyaan }}/jawaban/{{ $j->id_jawaban }}/edit"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit"></i></a>
                                                    <form
                                                        action="/kriteria/{{ $kriteria->id_kriteria }}/pertanyaan/{{ $j->id_pertanyaan }}/jawaban/{{ $j->id_jawaban }}",
                                                        method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apa yakin akan menghapus data periode ?')"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                    {{-- <a href="/kriteria/{{ $kriteria->id }}/pertanyaan/{{ $j->pertanyaan_id }}/jawaban/{{ $j->id }}/edit"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i></a> --}}
                                                    {{-- <a href="{{ route(
                                                        'kriteria.pertanyaan.destroy',
                                                        ['kriteria_id' => $pertanyaan->kriteria_id, 'id' => $pertanyaan->kriteria_id],
                                                        $pertanyaan->id,
                                                    ) }}"
                                                        class="btn btn-sm btn-danger hapus">
                                                        <i class="fas fa-trash-alt"></i></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#Jawaban').DataTable();
        });
    </script>
@stop
