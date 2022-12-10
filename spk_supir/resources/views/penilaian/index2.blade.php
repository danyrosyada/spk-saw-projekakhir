@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Penilaian Supir</h1>
        </div>
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tambah Kriteria</h4>
                </div>
                <div class="card-body">
                    @if (Session::has('msg'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Info!</strong> {{ Session::get('msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <form action="{{ route('penilaian.store') }}" method="post">
                            @csrf
                            {{-- <button class="btn btn-sm btn-primary float-right"> Simpan</button> --}}
                            <br><br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Nama Supir </th>
                                        @foreach ($kriteria as $key => $value)
                                            <th>{{ $value->nama_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($supir as $alt => $valt)
                                        <tr>
                                            <td>{{ $valt->nama }}</td>
                                            @if (count($valt->penilaian) > 0)
                                                @foreach ($kriteria as $key => $value)
                                                    <td>
                                                        <select name="crips_id[{{ $valt->id }}][]" class="form-control">
                                                            @foreach ($value->crips as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}"
                                                                    {{ $v_1->id == $valt->penilaian[$key]->crips_id ? 'selected' : '' }}>
                                                                    {{ $v_1->nama_crips }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach
                                            @else
                                                @foreach ($kriteria as $key => $value)
                                                    <td>
                                                        <select name="crips_id[{{ $valt->id }}][]" class="form-control">
                                                            @foreach ($value->crips as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_crips }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td> Tidak ada data </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div>
                    {{-- <div class="table-responsive">
                        <form action="{{ route('penilaian.store') }}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-primary float-right"> Simpan</button>
                            <br><br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Nama Supir </th>
                                        @foreach ($kriteria as $key => $value)
                                            <th>{{ $value->nama_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>


                                    @forelse($supir as $alt => $valt)
                                        <tr>
                                            <input type="hidden" name="supir_id" value="{{ $valt->id_supir }}">
                                            <input type="hidden" name="periode_id" value="{{ $valt->periode_id }}">

                                            <td>{{ $valt->id_supir }}  {{ $valt->nama }}</td>
                                            
                                            @if (count($valt->penilaian) > 0)   

                                                @foreach ($kriteria as $key => $value)
                                                    <td>
                                                        <select name="crips_id[{{ $valt->id }}][]" class="form-control">
                                                            @foreach ($value->crips as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}"
                                                                    {{ $v_1->id == $valt->penilaian[$key]->cirps_id ? 'selected' : '' }}>
                                                                    {{ $v_1->nama_crips }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach

                                            @else
                                                @foreach ($kriteria as $key => $value)
                                                    <td>
                                                        <select name="crips_id[{{ $valt->id }}][]" class="form-control">
                                                            @foreach ($value->crips as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}">{{ $v_1->nama_crips }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td> Tidak ada data </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endSection
