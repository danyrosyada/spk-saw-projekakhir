<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kriteria;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

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
            'bobot.required' => 'Bobot Harus diisi',
        ]);

        $bobot = $request->bobot_kriteria / 5;
        try {
            $pertanyaan = new Pertanyaan();
            $pertanyaan->kriteria_id = $request->kriteria_id;
            $pertanyaan->soal = $request->soal;
            $pertanyaan->bobot = $bobot;
            $pertanyaan->save();
            return redirect('/kriteria/' . $request->kriteria_id)->with('success', 'Kriteria berhasil ditambahkan');
            // return redirect('/kriteria/' . $request->kriteria_id)->with('success', 'Kriteria berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('kriteria')->with('gagal', 'Kriteria gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kriteriaId, $id)
    {
        $kriteria = Kriteria::findOrFail($kriteriaId);
        $pertanyaan = Pertanyaan::findOrFail($id);
        $jawaban = Jawaban::where('pertanyaan_id', $id)->get();

        $data = [
            'title' => 'Data Soal Tes',
            'kriteria' => $kriteria,
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
        ];
        // return $data;
        return view('pertanyaan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kriteriaId, $id)
    {
        try {
            $kriteria = Kriteria::findOrFail($kriteriaId);
            $pertanyaan = Pertanyaan::findOrFail($id);
            // $jawaban = Jawaban::findOrFail($id);
            $data = [
                'title' => 'Edit Kriteria',
                'kriteria' => $kriteria,
                'pertanyaan' => $pertanyaan,
                // 'jawaban' => $jawaban,
            ];
            // return $data;
            return view('pertanyaan.edit', $data);
        } catch (\Throwable $th) {
            // return redirect('/kriteria')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kriteriaId, $id)
    {
        $this->validate($request, [
            'soal' => 'required|string',
        ], [
            'soal.required' => 'Soal Tes Harus diisi',
            // 'bobot.required' => 'Bobot Harus diisi',
        ]);

        $bobot = $request->bobot_kriteria / 5;

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update([
            'soal' => $request->soal,
            'bobot' => $bobot,
        ]);
        return redirect('kriteria/' . $kriteriaId)->with('success', 'Jawaban berhasil diupdate');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kriteriaId, $id)
    {
        //
    }
}
