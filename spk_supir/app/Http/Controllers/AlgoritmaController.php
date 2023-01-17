<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Periode;
use Illuminate\Support\Facades\App;
class AlgoritmaController extends Controller
{

    public function index()
    {

        $periode = Periode::with('penilaian')->get();
        $data = [
            'title' => 'Periode Penilaian',
            'periode' => $periode
        ];
        return view('perhitungan.index', $data);
    }

    public function show($id)
    {
        try {
            $supir = [];
            $score_by_criteria = [];
            $total = [];
            $rank = [];
            $penilaian = Penilaian::with(
                'supir',
                'detailPenilaian.crips.kriteria',
                'detailPenilaian.tes.detailTes.jawaban',
                'detailPenilaian.tes.kriteria'
            )->where('id_periode', $id)->get();
            $kriteria = Kriteria::orderBy('id_kriteria', 'ASC')->get();
            $periode = Periode::findOrFail($id);

            foreach ($penilaian as $value) {
                foreach ($value->detailPenilaian as $valueDetail) {
                    if ($valueDetail->tes) {

                        $score_by_criteria[$valueDetail->tes->kriteria->nama_kriteria][] =
                            array_reduce($valueDetail->tes->detailTes->toArray(), function ($a, $b) {
                                return $a + $b['jawaban']['bobot'];
                            }, 0);
                    } else {
                        $score_by_criteria[$valueDetail->crips->kriteria->nama_kriteria][] =
                            $valueDetail->crips->bobot;
                    }
                }
                $supir[] = $value->supir;
            }

            foreach ($kriteria as $key => $value) {
                if ($value->attribut == "Benefit") {
                    $minmax = max($score_by_criteria[$value->nama_kriteria]);
                } else {
                    $minmax = min($score_by_criteria[$value->nama_kriteria]);
                }

                foreach ($score_by_criteria[$value->nama_kriteria] as $key => $value_score) {
                    if ($value->attribut == "Benefit") {
                        $newScore = round(($value_score / $minmax), 2);
                    } else {
                        $newScore = round(($minmax / $value_score), 2);
                    }
                    $total[$key] = ($total[$key] ?? 0) + (($newScore) * $value->bobot);
                }
            }

            foreach ($supir as $key => $value) {
                $tempTotal = $total;
                rsort($tempTotal);
                $ranking = (array_search($total[$key], $tempTotal)) + 1;
                if ($ranking > 0 || $ranking < 3) {
                    $rekomendasi[$ranking - 1] = $value;
                }
                $rank[] = $ranking;
            }

            $data = [
                'supir' => $supir,
                "kriteria" => $kriteria,
                "periode" => $periode,
                'total' => $total,
                'rank' => $rank,
                'rekomendasi' => $rekomendasi,
            ];

            return view('perhitungan.show', $data);
        } catch (\Throwable $th) {
            return redirect('perhitungan')->with('gagal', 'Data Rangking tidak bisa ditampilkan');
        }
    }

    public function cetakRangking($id){
        try {
            $supir = [];
            $score_by_criteria = [];
            $total = [];
            $rank = [];
            $penilaian = Penilaian::with(
                'supir',
                'detailPenilaian.crips.kriteria',
                'detailPenilaian.tes.detailTes.jawaban',
                'detailPenilaian.tes.kriteria'
            )->where('id_periode', $id)->get();
            $kriteria = Kriteria::orderBy('id_kriteria', 'ASC')->get();
            $periode = Periode::findOrFail($id);

            foreach ($penilaian as $value) {
                foreach ($value->detailPenilaian as $valueDetail) {
                    if ($valueDetail->tes) {
                        $score_by_criteria[$valueDetail->tes->kriteria->nama_kriteria][] =
                            array_reduce($valueDetail->tes->detailTes->toArray(), function ($a, $b) {
                                return $a + $b['jawaban']['bobot'];
                            }, 0);
                    } else {
                        $score_by_criteria[$valueDetail->crips->kriteria->nama_kriteria][] =
                            $valueDetail->crips->bobot;
                    }
                }
                $supir[] = $value->supir;
            }

            foreach ($kriteria as $key => $value) {
                if ($value->attribut == "Benefit") {
                    $minmax = max($score_by_criteria[$value->nama_kriteria]);
                } else {
                    $minmax = min($score_by_criteria[$value->nama_kriteria]);
                }

                foreach ($score_by_criteria[$value->nama_kriteria] as $key => $value_score) {
                    if ($value->attribut == "Benefit") {
                        $newScore = round(($value_score / $minmax), 2);
                    } else {
                        $newScore = round(($minmax / $value_score), 2);
                    }
                    $total[$key] = ($total[$key] ?? 0) + (($newScore) * $value->bobot);
                }
            }

            foreach ($supir as $key => $value) {
                $tempTotal = $total;
                rsort($tempTotal);
                $ranking = (array_search($total[$key], $tempTotal)) + 1;
                if ($ranking > 0 || $ranking < 3) {
                    $rekomendasi[$ranking - 1] = $value;
                }
                $rank[] = $ranking;
            }

            $data = [
                'supir' => $supir,
                "kriteria" => $kriteria,
                "periode" => $periode,
                'total' => $total,
                'rank' => $rank,
                'rekomendasi' => $rekomendasi,
            ];

            $date = date('His-Ymd');
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('perhitungan.cetak', $data);
            $pdf->setPaper('A4', 'potrait');
            return $pdf->stream('rangking - ' . $date . '.pdf');
            // return view('perhitungan.cetak', $data);
        } catch (\Throwable $th) {
            return redirect('perhitungan/'.$id)->with('gagal', 'Data Rangking tidak bisa ditampilkan');
        }
    }

    public function tahap($id)
    {
        try {
            $supir = [];
            $score_by_criteria = [];
            $total = [];
            $rank = [];
            $penilaian = Penilaian::with(
                'supir',
                'detailPenilaian.crips.kriteria',
                'detailPenilaian.tes.detailTes.jawaban',
                'detailPenilaian.tes.kriteria'
            )->where('id_periode', $id)->get();
            $kriteria = Kriteria::orderBy('id_kriteria', 'ASC')->get();
            $periode = Periode::findOrFail($id);

            foreach ($penilaian as $value) {
                foreach ($value->detailPenilaian as $valueDetail) {
                    if ($valueDetail->tes) {
                        $score_by_criteria[$valueDetail->tes->kriteria->nama_kriteria][] =
                            array_reduce($valueDetail->tes->detailTes->toArray(), function ($a, $b) {
                                return $a + $b['jawaban']['bobot'];
                            }, 0);
                    } else {
                        $score_by_criteria[$valueDetail->crips->kriteria->nama_kriteria][] =
                            $valueDetail->crips->bobot;
                    }
                    
                }
                $supir[] = $value->supir;
            }
            
            foreach ($kriteria as $key => $value) {
                if ($value->attribut == "Benefit") {
                    $minmax = max($score_by_criteria[$value->nama_kriteria]);
                } else {
                    $minmax = min($score_by_criteria[$value->nama_kriteria]);
                }

                // tahap normalisasi
                foreach ($score_by_criteria[$value->nama_kriteria] as $key => $value_score) {
                    if ($value->attribut == "Benefit") {
                        $newScore = round(($value_score / $minmax), 2);
                    } else {
                        $newScore = round(($minmax / $value_score), 2);
                    }
                    $score_by_criteria2[$value->nama_kriteria][$key] = round($newScore, 2);
                    $score_by_criteria3[$value->nama_kriteria][$key] = round($newScore * $value->bobot, 2);
                    $total[$key] = ($total[$key] ?? 0) + (($newScore) * $value->bobot);
                }
            }

            foreach ($supir as $key => $value) {
                $tempTotal = $total;
                rsort($tempTotal);
                $ranking = (array_search($total[$key], $tempTotal)) + 1;
                if ($ranking > 0 || $ranking < 3) {
                    $rekomendasi[$ranking - 1] = $value;
                }
                $rank[] = $ranking;
            }

            $data = [
                'supir' => $supir,
                'score_by_criteria' => $score_by_criteria,
                'score_by_criteria2' => $score_by_criteria2,
                'score_by_criteria3' => $score_by_criteria3,
                'kriteria' => $kriteria,
                'periode' => $periode,
                'total' => $total,
                'rank' => $rank,
                'rekomendasi' => $rekomendasi,
            ];

            return view('perhitungan.tahap', $data);
        } catch (\Throwable $th) {
            return redirect('perhitungan/' . $id)->with('gagal', 'Data Tahap tidak bisa ditampilkan');
        }
    }


}
