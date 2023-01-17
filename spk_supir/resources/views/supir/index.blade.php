@extends('layouts.main')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Data Supir</h1>
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
        <a class="btn btn-icon icon-left btn-primary" href="/supir/create" role="button">Tambah
            Data Supir</a>
        <br>
        <br>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Data Supir</h4>
            </div>
            <div class="card-body">
                <table id="DataTable" class="table table-bordered table-striped-columns table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id Supir</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Lahir</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supir as $s)
                            <tr>
                                <td>{{ $s->id_supir }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->lahir }}, {{ $s->tgl_lahir }}</td>
                                <td>{{ $s->hp }}</td>
                                <td>{{ $s->alamat }}</td>
                                <td>
                                    <a href="/supir/{{ $s->id_supir }}/edit" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('supir.destroy', $s->id_supir) }}"
                                        class="btn btn-sm btn-danger hapus">
                                        <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </section>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#DataTable').DataTable();
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
                                            "{{ route('supir.index') }}"
                                    });
                                }
                            })

                        } else {
                            swal("Data aman tidak dihapus!");
                        }
                    });
                return false;
            });
        });
    </script>
@stop
