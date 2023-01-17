@extends('layouts.main')

@section('content')
    <script>
        const optionsByPeriod = <?php echo json_encode($supir); ?>

        const onChangePeriode = (e) => {
            const value = e?.value
            const options = optionsByPeriod[value]
            const selectSupir = document.getElementById('supir')
            selectSupir.innerHTML = ''
            let option = document.createElement("option");
            option.text = "PILIH SUPIR";
            option.value = "";
            if (value && options) {
                selectSupir.appendChild(option)
                options.forEach((item => {
                    option = document.createElement("option");
                    option.text = item.nama;
                    option.value = item.id_supir;
                    selectSupir.appendChild(option)
                }))
            }
        }

        const onChangeSupir = e => {
            const value = e?.value
            const periodeId = document.getElementById('periode')
            const alamatId = document.getElementById('alamat')
            const nohpId = document.getElementById('hp')
            const option = optionsByPeriod[periodeId?.value]?.find(item => item.id_supir === Number(value))
            alamatId.value = option?.alamat || ''
            nohpId.value = option?.hp || ''
        }
    </script>
    <section class="section">
        <div class="section-header">
            <h1>Buat Penilaian</h1>
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
        {{-- <a class="btn btn-icon icon-left btn-primary" href="/supir/create" role="button"><i
                                class="fas fa-user-plus"></i>TAMBAH DATA SUPIR</a> --}}
        <div class="card card-primary">
            <div class="card-body">
                <form action="/penilaian" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="periode">PERIODE</label>
                        <select class="form-control" name="periode" id="periode" required
                            onchange="onChangePeriode(this)">
                            <option value="">PILIH PERIODE</option>
                            {{ $periode }}
                            @foreach ($periode as $value)
                                <option value="{{ $value['id_periode'] }}">
                                    {{ $value['judul'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="supir">SUPIR</label>
                        <select class="form-control" name="supir" id="supir" required onchange="onChangeSupir(this)">
                            <option value="">PILIH SUPIR</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hp">HP</label>
                        <input id="hp" readonly class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="alamat">ALAMAT</label>
                        <textarea id="alamat" readonly class="form-control"></textarea>
                    </div>
                    @foreach ($kriteria as $key => $value)
                        <div>
                            <h5>{{ $key + 1 }}. {{ $value['nama_kriteria'] }}</h5>
                            <div class="ml-4">
                                @foreach ($value['crips'] as $key_crips => $value_crips)
                                    <div>
                                        <label>
                                            <input required name="crips[{{ $value['id_kriteria'] }}]" type="radio"
                                                value={{ $value_crips['id_crips'] }} />
                                            {{ $value_crips['nama_crips'] }}
                                        </label>
                                    </div>
                                @endforeach

                                @foreach ($value['pertanyaan'] as $key_pertanyaan => $value_pertanyaan)
                                    <div>
                                        <h6>{{ $value_pertanyaan['soal'] }}</h6>
                                        <div>
                                            @foreach ($value_pertanyaan['jawaban'] as $key_jawaban => $value_jawaban)
                                                <label class="mr-3">
                                                    <input required
                                                        name="test[{{ $value['id_kriteria'] }}][{{ $value_pertanyaan['id_pertanyaan'] }}]"
                                                        type='radio' value={{ $value_jawaban['id_jawaban'] }} />
                                                    {{ $value_jawaban['pg'] }}.
                                                    {{ $value_jawaban['jawaban'] }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            SIMPAN
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
