@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Data Penilaian</h1>
        </div>
        <div class="card card-primary">
            <div class="card-body">
                <form action="/penilaian" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="periode">PERIODE</label>
                        <select class="form-control" name="periode" id="periode" disabled>
                            {{-- <option value="">PILIH PERIODE</option> --}}
                            <option value="{{ $penilaian->periode->id_periode }}">
                                {{ $penilaian->periode->judul }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="supir">SUPIR</label>
                        <select class="form-control" name="supir" id="supir"   disabled>
                            {{-- <option value="">PILIH SUPIR</option> --}}
                            <option value="{{ $penilaian->supir->id_supir }}">
                                {{ $penilaian->supir->nama }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hp">HP</label>
                        <input id="hp" readonly class="form-control" value="{{ $penilaian->supir->hp }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input id="alamat" readonly class="form-control" value="{{ $penilaian->supir->alamat }}">
                    </div>
                    @foreach ($penilaian->detailPenilaian as $key => $value)
                        <div>
                            <h5>{{ $key + 1 }}.
                                {{ $value['tes'] ? $value['tes']['kriteria']['nama_kriteria'] : $value['crips']['kriteria']['nama_kriteria'] }}
                            </h5>
                            <div class="ml-4">
                                @if ($value['crips'])
                                    <div>
                                        <label>
                                            <input name={{ $key }} type="radio"
                                                value={{ $value['crips']['nama_crips'] }} checked readonly />
                                            {{ $value['crips']['nama_crips'] }}
                                        </label>
                                    </div>
                                @elseif($value['tes'])
                                    @foreach ($value['tes']['detail_tes'] as $key_detail_tes => $value_detail_tes)
                                        <div>
                                            <h6>{{ $value_detail_tes['pertanyaan']['soal'] }}</h6>
                                            <div>
                                                <label class="mr-3">
                                                    <input
                                                        name="test[{{ $key }}][{{ $value_detail_tes['id_detail_tes'] }}]"
                                                        type='radio'
                                                        checked
                                                        value={{ $value_detail_tes['jawaban']['id_jawaban'] }} />
                                                    {{ $value_detail_tes['jawaban']['pg'] }}.
                                                    {{ $value_detail_tes['jawaban']['jawaban'] }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </section>
@endsection