@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="col">
                <h1>Data {{ $kriteria->jenis == 'Pertanyaan' ? '' : 'Crips' }} {{ $kriteria->nama_kriteria }}</h1>
                <a href="/kriteria" class="btn btn-warning float-right">Kembali</a>
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
            @if ($kriteria->jenis === 'Crips')
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Tambah Crips</h4>
                            </div>
                            <div class="card-body">
                                <form action="/crips" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $kriteria->id_kriteria }}" name="id_kriteria">
                                        <label for="nama_crips">Nama Crips</label>
                                        <input id="nama_crips" type="text"
                                            class="form-control rounded-top @error('nama_crips') is-invalid @enderror"
                                            name="nama_crips" value="{{ old('nama_crips') }}">
                                        @error('nama_crips')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bobot">Bobot Crips</label>
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
                                            href="/kriteria/{{ $kriteria->id }}"class="btn btn-danger btn-lg btn-block">Batal</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>List Crips {{ $kriteria->nama_kriteria }}</h4>
                            </div>
                            <div class="card-body">
                                <table id="Crips" class="table table-bordered table-striped-columns table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Crips</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($crips as $c)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $c->nama_crips }}</td>
                                                <td>{{ $c->bobot }}</td>
                                                <td>
                                                    <a href="/crips/{{ $c->id_crips }}/edit"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit"></i></a>
                                                        <a href="/crips/{{ $c->id_crips }}"
                                                            class="btn btn-sm btn-danger hapus">
                                                            <i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @elseif($kriteria->jenis == 'Pertanyaan')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Tambah Pertanyaan</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/kriteria/{{ $kriteria->id_kriteria }}/pertanyaan" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $kriteria->id_kriteria }}" name="id_kriteria">
                                            <input type="hidden" value="{{ $kriteria->bobot }}" name="bobot_kriteria">
                                            <label for="soal">Soal</label>
                                            <input id="soal" type="text"
                                                class="form-control rounded-top @error('soal') is-invalid @enderror"
                                                name="soal" value="{{ old('soal') }}">
                                            @error('soal')
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
                                                href="/kriteria/{{ $kriteria->id_kriteria }}"class="btn btn-danger btn-lg btn-block">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>List {{ $kriteria->nama_kriteria }}</h4>
                                </div>
                                <div class="card-body">
                                    <table id="Jawaban" class="table table-bordered table-striped-columns table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Soal Tes</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pertanyaan as $p)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $p->soal }}</td>
                                                    <td>
                                                        <a href="/kriteria/{{ $kriteria->id_kriteria }}/pertanyaan/{{ $p->id_pertanyaan }}/edit"
                                                            class="btn btn-sm btn-warning">
                                                            <i class="fa fa-edit"></i></a>
                                                        <a href="/kriteria/{{ $kriteria->id_kriteria }}/pertanyaan/{{ $p->id_pertanyaan }}"
                                                            class="btn btn-sm btn-danger hapus">
                                                            <i class="fas fa-trash-alt"></i></a>
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
        </div>
        @endif
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
                                        "{{ route('kriteria.show', $kriteria->id_kriteria) }}"
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
