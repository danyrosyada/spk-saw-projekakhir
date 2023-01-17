<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kriteria;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'pg' => 'required|string',
            'jawaban' => 'required|string',
            'bobot' => 'required|numeric',
        ], [
            'pg.required' => 'Pilihan Ganda Harus diisi',
            'jawaban.required' => 'Jawaban Harus diisi',
            'bobot.required' => 'Bobot Harus diisi',
        ]);

        // $bobot = $request->bobot_kriteria / 5;
        $jawaban = new Jawaban();
        $jawaban->id_pertanyaan = $request->id_pertanyaan;
        $jawaban->pg = $request->pg;
        $jawaban->jawaban = $request->jawaban;
        $jawaban->bobot = $request->bobot;
        $jawaban->save();

        return redirect('kriteria/' . $request->id_kriteria . '/pertanyaan/' . $request->id_pertanyaan)->with('success', 'Jawaban berhasil disimpan');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kriteriaId, $pertanyaanId, $id)
    {
        try {
            $kriteria = Kriteria::findOrFail($kriteriaId);
            $pertanyaan = Pertanyaan::findOrFail($pertanyaanId);
            $jawaban = Jawaban::findOrFail($id);
            $data = [
                'title' => 'Edit Kriteria',
                'kriteria' => $kriteria,
                'pertanyaan' => $pertanyaan,
                'jawaban' => $jawaban,
            ];
            return view('jawaban.edit', $data);
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
    public function update(Request $request, $kriteriaId, $pertanyaanId, $id)
    {
        $this->validate($request, [
            'pg' => 'required|string',
            'jawaban' => 'required|string',
            'bobot' => 'required|numeric',
        ], [
            'pg.required' => 'Pilihan Ganda Harus diisi',
            'jawaban.required' => 'Jawaban Harus diisi',
            'bobot.required' => 'Bobot Harus diisi',
        ]);

        $jawaban = Jawaban::findOrFail($id);
        $jawaban->update([
            'pg' => $request->pg,
            'jawaban' => $request->jawaban,
            'bobot' => $request->bobot,
        ]);
        return redirect('kriteria/' . $kriteriaId . '/pertanyaan/' . $pertanyaanId)->with('success', 'Jawaban berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kriteriaId, $pertanyaanId, $id)
    {
        try {
            Jawaban::destroy($id);
            return redirect('kriteria/' . $kriteriaId . '/pertanyaan/' . $pertanyaanId)->with('success', 'Jawaban berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect('kriteria/' . $kriteriaId . '/pertanyaan/' . $pertanyaanId)->with('gagak', 'Jawaban gagal dihapus');
        }
    }
}
