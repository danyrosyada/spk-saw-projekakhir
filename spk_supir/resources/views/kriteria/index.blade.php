@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Kriteria</h1>
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
        <a class="btn btn-icon icon-left btn-primary" href="/kriteria/create" role="button">
            Tambah Data Kriteria</a>
        <br><br>
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Kriteria</h4>
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->nama_kriteria }}</td>
                                    <td>{{ $k->jenis }}</td>
                                    <td>{{ $k->attribut }}</td>
                                    <td>{{ $k->bobot }}</td>
                                    <td>
                                        <a href="/kriteria/{{ $k->id_kriteria }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye"></i></a>
                                        <a href="/kriteria/{{ $k->id_kriteria }}/edit" class="btn btn-sm btn-warning">
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
