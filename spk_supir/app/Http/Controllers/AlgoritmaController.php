<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Supir;
use Illuminate\Http\Request;

class AlgoritmaController extends Controller
{
    public function index()
    {

        $supir = Supir::with('penilaian.crips')->get();
        $kriteria = Kriteria::with('crips')->orderBy('nama_kriteria', 'ASC')->get();
        $penilaian = Penilaian::with('crips', 'supir')->get();

        if (count($penilaian) == 0) {
            return redirect('penilaian');
        }

        // return response()->json($supir);

        //! mencari min maxx
        foreach ($kriteria as $key => $value) {
            foreach ($penilaian as $key => $value_1) {
                if ($value->id == $value_1->crips->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $minMax[$value->id][] = $value_1->crips->bobot;
                    } else if ($value->attribut == 'Cost') {
                        $minMax[$value->id][] = $value_1->crips->bobot;
                    }
                }
            }
        }
        // dd($minMax);

        //! normalisasi

        foreach ($penilaian as $key_1 => $value_1) {
            foreach ($kriteria as $key => $value) {
                if ($value->id == $value_1->crips->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $normalisasi[$value_1->supir->nama][$value->id] = $value_1->crips->bobot / max($minMax[$value->id]);
                    } else if ($value->attribut == 'Cost') {
                        $normalisasi[$value_1->supir->nama][$value->id]  = min($minMax[$value->id]) / $value_1->crips->bobot;
                    }
                }
            }
        }
        // dd($normalisasi);

        //! perangkingan

        foreach ($normalisasi as $key => $value) {
            foreach ($kriteria as $key_1 => $value_1) {
                $rank[$key][] = $value[$value_1->id] * $value_1->bobot;
            }
        }
        // dd($rank); 

        // generate rangking
        $rangking = $normalisasi;
        foreach ($normalisasi as $key => $value) {
            $rangking[$key][] = array_sum($rank[$key]);
        }
        arsort($rangking);  
        // dd($normalisasi); 



        return view('perhitungan.index', compact('supir', 'kriteria', 'normalisasi', 'rangking'));
    }
}
