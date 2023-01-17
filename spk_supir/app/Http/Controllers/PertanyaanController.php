<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kriteria;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'soal' => 'required|string',
        ], [
            'soal.required' => 'Soal Tes Harus diisi',
        ]);

        try {
            $pertanyaan = Pertanyaan::create([
                'id_kriteria' => $request->id_kriteria,
                'soal' => $request->soal,
            ]);

            Jawaban::insert([
                [
                    'id_pertanyaan' => $pertanyaan->id_pertanyaan,
                    'pg' => 'A',
                    'jawaban' => 'Sangat Baik',
                    'bobot' => 5,
                ],
                [
                    'id_pertanyaan' => $pertanyaan->id_pertanyaan,
                    'pg' => 'B',
                    'jawaban' => 'Baik',
                    'bobot' => 4,
                ],
                [
                    'id_pertanyaan' => $pertanyaan->id_pertanyaan,
                    'pg' => 'C',
                    'jawaban' => 'Cukup',
                    'bobot' => 3,
                ],
                [
                    'id_pertanyaan' => $pertanyaan->id_pertanyaan,
                    'pg' => 'D',
                    'jawaban' => 'Buruk',
                    'bobot' => 2,
                ],
                [
                    'id_pertanyaan' => $pertanyaan->id_pertanyaan,
                    'pg' => 'E',
                    'jawaban' => 'Sangat Buruk',
                    'bobot' => 1,
                ],
            ]);

            return redirect('/kriteria/' . $request->id_kriteria)->with('success', 'Pertanyaan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/kriteria/' . $request->id_kriteria)->with('gagal', 'Pertanyaan gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idKriteria, $id)
    {
        $kriteria = Kriteria::findOrFail($idKriteria);
        $pertanyaan = Pertanyaan::findOrFail($id);
        $jawaban = Jawaban::where('id_pertanyaan', $id)->get();

        $data = [
            'title' => 'Data Soal Tes',
            'kriteria' => $kriteria,
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
        ];
        return view('pertanyaan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idKriteria, $id)
    {
        try {
            $kriteria = Kriteria::findOrFail($idKriteria);
            $pertanyaan = Pertanyaan::findOrFail($id);
            $data = [
                'title' => 'Edit Kriteria',
                'kriteria' => $kriteria,
                'pertanyaan' => $pertanyaan,
            ];
            return view('pertanyaan.edit', $data);
        } catch (\Throwable $th) {
            return redirect('/kriteria/' . $idKriteria)->with('gagal', 'Pertanyaan gagal diubah');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idKriteria, $id)
    {
        $this->validate($request, [
            'soal' => 'required|string',
        ], [
            'soal.required' => 'Soal Tes Harus diisi',
        ]);

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update([
            'soal' => $request->soal,
        ]);
        return redirect('kriteria/' . $idKriteria)->with('success', 'Pertanyaan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idKriteria, $id)
    {
        try {
            Pertanyaan::destroy($id);
            $jawaban = Jawaban::where('id_pertanyaan', $id);
            $jawaban->delete();
            // $pertanyaan = Pertanyaan::where('id_kriteria', $id);
            // $pertanyaan->delete();
        } catch (\Throwable $th) {
            return redirect('kriteria/' . $idKriteria)->with('gagal', 'Supir gagal dihapus');
        }
    }
}
