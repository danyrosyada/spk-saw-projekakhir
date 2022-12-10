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
                            <h4>Periode</h4>
                        </div>
                        <div class="card-body">
                            <form action="/periode" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input id="judul" type="text"
                                        class="form-control rounded-top @error('judul') is-invalid @enderror" name="judul"
                                        value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <input id="ket" type="text"
                                        class="form-control rounded-top @error('ket') is-invalid @enderror" name="ket"
                                        value="{{ old('ket') }}">
                                    @error('ket')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan
                                    </button>
                                    <a href="/periode"class="btn btn-danger btn-lg btn-block">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>List Periode</h4>
                        </div>
                        <div class="card-body">
                            <table id="DataTable" class="table table-striped-columns table-hover">
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
                                                <div
                                                    class="badge {{ $p->status == '0' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $p->status == 0 ? 'Dibuka' : 'Ditutup' }}</div>
                                            </td>
                                            <td>
                                                <a href="/periode/{{ $p->id_periode }}/edit"
                                                    class="btn btn-sm btn-warning">
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
