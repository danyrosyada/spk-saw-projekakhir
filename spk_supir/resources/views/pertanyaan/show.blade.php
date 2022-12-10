@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
                <h1>Data {{ $kriteria->jenis == 'Pertanyaan' ? '' : 'Crips' }} Jawaban {{ $kriteria->nama_kriteria }}</h1>
                <a href="/kriteria/{{ $kriteria->id }}" class="btn btn-warning float-right">Kembali</a>
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
                            <form action="/kriteria/{{ $kriteria->id }}/pertanyaan/{{ $pertanyaan->id }}/jawaban"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="pg">Pilihan Ganda</label>
                                    <select class="form-control @error('pg') is-invalid @enderror"
                                        value="{{ old('pg') }}" name="pg" id="pg">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    {{-- <input type="hidden" value="{{ $kriteria->id }}" name="kriteria_id">
                                    <input type="hidden" value="{{ $kriteria->bobot }}" name="bobot_kriteria"> --}}
                                    <input type="hidden" value="{{ $pertanyaan->id }}" name="pertanyaan_id">
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
                                    <label for="point">Point</label>
                                    <input class="form-control rounded-top @error('point') is-invalid @enderror"
                                        name="point" value="{{ old('point') }}" type="number">
                                    @error('point')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan
                                    </button>
                                    <a href="/kriteria/{{ $pertanyaan->kriteria_id }}/pertanyaan/{{ $pertanyaan->id }}"class="btn btn-danger btn-lg btn-block">Batal</a>
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
                                            <th scope="col">#</th>
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
                                                <td>{{ $j->point }}</td>
                                                <td>
                                                    {{-- <a href="/pertanyaan/{{ $j->id }}" class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i></a> --}}
                                                    <a href="/kriteria/{{ $kriteria->id }}/pertanyaan/{{ $j->pertanyaan_id }}/jawaban/{{ $j->id }}/edit"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit"></i></a>
                                                    <form
                                                        action="/kriteria/{{ $kriteria->id }}/pertanyaan/{{ $j->pertanyaan_id }}/jawaban/{{ $j->id }}",
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
            $('#Crips').DataTable();
            $('#Jawaban').DataTable();
        })
        $('.hapus').on('click', function() {
            swal({
                    title: "Yakin ingin hapus?",
                    text: "Sekali dihapus, data tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'DELETE',
                            data: {
                                '_token': "{{ csrf_token() }}"
                            },
                            success: function() {
                                swal("Data Berhasil dihapus!", {
                                    icon: "success",
                                }).then((willDelete) => {
                                    window.location =
                                        "{{ route('kriteria.show', $kriteria->id) }}"
                                });
                            }
                        })

                    } else {
                        swal("Data aman tidak dihapus!");
                    }
                });
            return false;
        });
    </script>
@stop
