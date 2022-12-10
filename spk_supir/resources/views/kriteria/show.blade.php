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
                                        <input type="hidden" value="{{ $kriteria->id }}" name="kriteria_id">
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
                                        <a href="/kriteria/{{ $kriteria->id }}"class="btn btn-danger btn-lg btn-block">Batal</a>
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
                                {{-- <a class="btn btn-icon icon-left btn-primary" href="/kriteria/create" role="button"><i
                                    class="fas fa-user-plus"></i>Tambah
                                Kriteria</a> --}}
                                <table id="Crips" class="table table-striped-columns table-hover">
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
                                                <td>{{ $c->id }}</td>
                                                <td>{{ $c->nama_crips }}</td>
                                                <td>{{ $c->bobot }}</td>
                                                <td>
                                                    <a href="/crips/{{ $c->id }}/edit"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('crips.destroy', $c->id) }}"
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
                                    <h4>Data Kriteria</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/pertanyaan" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $kriteria->id }}" name="kriteria_id">
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
                                        {{-- <div class="form-group">
                                            <label for="bobot">Bobot Soal</label>
                                            <input class="form-control rounded-top @error('bobot') is-invalid @enderror"
                                                name="bobot" value="{{ old('bobot') }}" type="number">
                                            @error('bobot')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Simpan
                                            </button>
                                        <a href="/kriteria/{{ $kriteria->id }}"class="btn btn-danger btn-lg btn-block">Batal</a>
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
                                            @foreach ($pertanyaan as $p)
                                                <tr>
                                                    <td>{{ $p->id }}</td>
                                                    <td>{{ $p->soal }}</td>
                                                    <td>{{ $p->bobot }}</td>
                                                    <td>
                                                        <a href="/kriteria/{{ $kriteria->id }}/pertanyaan/{{ $p->id }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa fa-eye"></i></a>
                                                        <a href="/kriteria/{{ $kriteria->id }}/pertanyaan/{{ $p->id }}/edit"
                                                            class="btn btn-sm btn-warning">
                                                            <i class="fa fa-edit"></i></a>
                                                        {{-- <a href="{{ route('kriteria.' . $kriteria->id . '.pertanyaan.destroy', $p->id) }}"
                                                            class="btn btn-sm btn-danger hapus">
                                                            <i class="fas fa-trash-alt"></i></a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tr class="table-active">
                                            <th colspan="2" style="text-align: center">Total Bobot</th>
                                            <th>{{ $tpertanyaan }}</th>
                                            <th></th>
                                        </tr>
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
    <div class="modal fade" id="modalTambahBarang" tabindex="-1" aria-labelledby="modalTambahBarang"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--FORM TAMBAH BARANG-->
                    <form action="" method=" ">
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" class="form-control" id="addNamaBarang" name="addNamaBarang"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Barang</label>
                            <input type="text" class="form-control" id="addJumlahBarang" name="addJumlahBarang">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                    <!--END FORM TAMBAH BARANG-->
                </div>
            </div>
        </div>
    </div>
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
