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
            'point' => 'required|numeric',
        ], [
            'pg.required' => 'Pilihan Ganda Harus diisi',
            'jawaban.required' => 'Jawaban Harus diisi',
            'point.required' => 'Point Harus diisi',
        ]);

        // $bobot = $request->bobot_kriteria / 5;
        $jawaban = new Jawaban();
        $jawaban->pertanyaan_id = $request->pertanyaan_id;
        $jawaban->pg = $request->pg;
        $jawaban->jawaban = $request->jawaban;
        $jawaban->point = $request->point;
        $jawaban->save();

        return $request;
        return redirect('/kriteria/' . $request->kriteria_id)->with('success', 'Kriteria berhasil ditambahkan');
        // return redirect('/kriteria/' . $request->kriteria_id)->with('success', 'Kriteria berhasil ditambahkan');
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
            // return $data;
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
            'point' => 'required|numeric',
        ], [
            'pg.required' => 'Pilihan Ganda Harus diisi',
            'jawaban.required' => 'Jawaban Harus diisi',
            'point.required' => 'Point Harus diisi',
        ]);

        $jawaban = Jawaban::findOrFail($id);
        $jawaban->update([
            'pg' => $request->pg,
            'jawaban' => $request->jawaban,
            'point' => $request->point,
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
