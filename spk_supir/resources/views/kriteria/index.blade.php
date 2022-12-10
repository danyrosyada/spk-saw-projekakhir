@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Kriteria</h1>
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
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>List Kriteria</h4>
                        </div>
                        <div class="card-body">
                            <table id="DataTable" class="table table-bordered table-striped-columns table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Attribut</th>
                                        <th scope="col">Bobot</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria as $k)
                                        <tr>
                                            <td>{{ $k->id }}</td>
                                            <td>{{ $k->nama_kriteria }}</td>
                                            <td>{{ $k->jenis }}</td>
                                            <td>{{ $k->attribut }}</td>
                                            <td>{{ $k->bobot }}</td>
                                            <td>
                                                <a href="/kriteria/{{ $k->id }}" class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i></a>
                                                <a href="/kriteria/{{ $k->id }}/edit"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fa fa-edit"></i></a>
                                                {{-- <a href="{{ route('kriteria.destroy', $k->id) }}"
                                                    class="btn btn-sm btn-danger hapus">
                                                    <i class="fas fa-trash-alt"></i></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tr class="table-active">
                                    <th colspan="4" style="text-align: center">Total Bobot</th>
                                    <th>{{ $total }}</th>
                                    <th></th>
                                </tr>
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
            $('#DataTable').DataTable();
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
                                    window.location = "{{ route('kriteria.index') }}"
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
