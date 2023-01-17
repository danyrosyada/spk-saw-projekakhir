<?php

namespace App\Http\Controllers;

use App\Models\DetailPenilaian;
use App\Models\DetailTes;
use App\Models\Kriteria;
use App\Models\Periode;
use App\Models\Tes;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{

    public function index()
    {
        try {
            $periode = Periode::with('penilaian')->get();
            $data = [
                'title' => 'Periode Penilaian',
                'periode' => $periode
            ];
            return view('penilaian.index', $data);
        } catch (\Throwable $th) {
            return redirect('penilaian.index')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    public function show($idPeriode)
    {
        try {
            $penilaian = Penilaian::with('periode', 'supir', 'detailPenilaian.crips', 'detailPenilaian.tes.kriteria')->WHERE('id_periode', $idPeriode)->orderBy('total_score')->get();
            $periode = Periode::findOrFail($idPeriode);
            $data = [
                'title' => 'Penilaian',
                'penilaian' => $penilaian,
                'periode' => $periode,
            ];
            return view('penilaian.show', $data);
        } catch (\Throwable $th) {
            return redirect('penilaian.index')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    public function create()
    {
        try {
            $kriteria = Kriteria::with('pertanyaan.jawaban', 'crips')->get();
            $periode = Periode::WHERE('status', 1)->get();
            foreach ($periode as $item_periode) {
                $supir[$item_periode->id_periode] =
                    DB::select("SELECT * FROM `supir` WHERE `supir`.`id_supir` NOT IN
                    (select id_supir FROM penilaian WHERE penilaian.id_periode =
                    $item_periode->id_periode)");
            }
            $data = [
                'title' => 'Buat Penilaian',
                'kriteria' => $kriteria,
                "supir" => $supir,
                "periode" => $periode,
            ];
            return view('penilaian.create', $data);
        } catch (\Throwable $th) {
            return redirect('penilaian.index')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    public function store(Request $request)
    {
        $total = 0;
        $penilaian = Penilaian::create([
            "id_supir" => $request->supir,
            "id_periode" => $request->periode,
            "total_score" => 0
        ]);
        foreach (($request->test ?? []) as $key => $value) {
            $createTest = Tes::create([
                "id_kriteria" => $key,
            ]);
            foreach (($value ?? []) as $keyDetail => $detailValue) {
                $detailTest = DetailTes::create([
                    "id_tes" => $createTest->id_tes,
                    "id_pertanyaan" => $keyDetail,
                    "id_jawaban" => $detailValue
                ]);

                $total += $detailTest->jawaban->bobot;
            }
            DetailPenilaian::create([
                "id_crips" => null,
                "id_tes" => $createTest->id_tes,
                "id_penilaian" => $penilaian->id_penilaian
            ]);
        }

        foreach (($request->crips ?? []) as $key => $value) {
            $detail = DetailPenilaian::create([
                "id_crips" => $value,
                "id_tes" => null,
                "id_penilaian" => $penilaian->id_penilaian
            ]);
            $total += $detail->crips->bobot;
        }
        $penilaian->total_score = $total;
        $penilaian->save();
        return redirect('/penilaian')->with('success', 'Penilaian Berhasil Disimpan');
    }

    public function detail($idPenilaian)
    {
        try {
            $penilaian = Penilaian::with(
                'supir',
                'periode',
                'detailPenilaian.crips.kriteria',
                'detailPenilaian.tes.kriteria'
            )->WHERE('id_penilaian', $idPenilaian)->first();

            
            foreach ($penilaian['detailPenilaian'] as $key => $detail) {
                if ($detail['tes']) {
                    $penilaian['detailPenilaian'][$key]['tes']['detail_tes'] = DetailTes::with('pertanyaan', 'jawaban')->where('id_tes', $detail['tes']->id_tes)->get();
                }
            }
            $data = [
                'title' => 'Detail Data Penilaian',
                'penilaian' => $penilaian,

            ];
            return view('penilaian.detail', $data);
        } catch (\Throwable $th) {
           return redirect('/penilaian/' . $idPenilaian)->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    public function tutup($idPeriode)
    {
        $periode = Periode::findOrFail($idPeriode);
        $periode->update([
            'status' => 0,
        ]);
        return redirect('/penilaian/' . $idPeriode)->with('success', 'Periode Penilaian berhasil ditutup');
    }
}