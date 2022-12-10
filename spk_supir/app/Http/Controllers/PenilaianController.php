<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Supir;
use Exception;
use Illuminate\Support\Facades\DB as FacadesDB;

class PenilaianController extends Controller
{

    public function index()
    {
        $penilaian = Penilaian::all();
        $data = [
            'title' => 'Penilaian',
            'penilaian' => $penilaian
        ];
        return view('penilaian.index', $data);
    }

    public function create(){
        try {
            $data = [
                'title' => 'Buat Penilaian',
                // 'periode' => Periode::all(),
            ];
            return view('penilaian.create', $data);
        } catch (\Throwable $th) {
            // return redirect('periode.index')->with('gagal', 'Halaman Gagal Diakses');
        }
    }


    public function index2()
    {
        $supir = Supir::with('penilaian.crips')->get();
        $kriteria = Kriteria::with('crips')->orderBy('nama_kriteria', 'ASC')->get();
        // $data = [
        //     'title' => 'Penilaian',
        //     'supir' => compact('supir'),
        //     'kriteria'=> compact('kriteria'),
        // ];
        // return response()->json($kriteria);
        return view('penilaian.index', compact('supir', 'kriteria'));
    }

    public function store2(Request $request)
    {

        return response()->json($request);
        try {
            // FacadesDB::select("TRUNCATE penilaian");
            foreach ($request->crips_id as $key => $value) {
                foreach ($value as $key_1 => $value_1) {
                    // Penilaian::create([
                    //     'supir_id' => $key,
                    //     'crips_id'      => $value_1,
                    //     'periode_id'      => $request->periode_id,
                    // ]);
                    return $key;
                }
            }
            return back()->with('msg', 'Berhasil Disimpan');
        } catch (Exception $e) {
            // \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            // die("Gagal");
        }
    }
}
