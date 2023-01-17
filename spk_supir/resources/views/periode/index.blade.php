@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Periode</h1>
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
        <a class="btn btn-icon icon-left btn-primary" href="/periode/create" role="button">Tambah Data Periode</a>
        <br><br>
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Periode</h4>
                </div>
                <div class="card-body">
                    <table id="DataTable" class="table table-bordered table-striped-columns table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Periode</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periode as $p)
                                <tr>
                                    <td>{{ $p->id_periode }}</td>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ $p->ket }}</td>
                                    <td>
                                        <div class="badge {{ $p->status == '1' ? 'badge-success' : 'badge-danger' }}">
                                            {{ $p->status == 1 ? 'Dibuka' : 'Ditutup' }}</div>
                                    </td>
                                    <td>
                                        <a href="/periode/{{ $p->id_periode }}/edit" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i></a>
                                        {{-- <form action="/periode/{{ $p->id }}", method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apa yakin akan menghapus data periode ?')"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
    </script>
@stop
