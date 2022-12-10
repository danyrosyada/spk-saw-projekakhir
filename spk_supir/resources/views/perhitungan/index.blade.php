@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Perhitungan Saw</h1>
        </div>
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tahap Analisa</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_analisa" class="table table-hover table-bordered">
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
                                            @foreach ($valt->penilaian as $key => $value)
                                                <td>
                                                    {{ $value->crips->bobot }}
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
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tahap Normalisasi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_normalisasi" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th> Nama Supir / Kriteria </th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($normalisasi as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach ($value as $key_1 => $value_1)
                                            <td>
                                                {{ $value_1 }}
                                                {{-- @if ($value[count($value) - 1] != $key_1)
                                                {{ $value_1 }}
                                            @endif --}}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tahap Perangkingan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb_rangking" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Bobot
                                    </th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->bobot }}</th>
                                    @endforeach
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Supir</th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->nama_kriteria }}</th>
                                    @endforeach
                                    <th>Total</th>
                                    <th>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($rangking as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach ($value as $key_1 => $value_1)
                                            <td>{{ number_format($value_1, 1) }}</td>
                                        @endforeach
                                        <td>{{ $no++ }}</td>
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
            $('#tb_analisa').DataTable();
            $('#tb_normalisasi').DataTable();
            $('#tb_rangking').DataTable();
        });
    </script>
@stop
