<?php

namespace App\Http\Controllers;

use App\Models\Crips;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Pertanyaan;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $kriteria = Kriteria::all();
            $total = $kriteria->sum('bobot');

            $data = [
                'title' => 'Kelola Kriteria',
                'kriteria' => $kriteria,
                'total'=> $total
            ];
            return view('kriteria.index', $data);
        } catch (\Throwable $th) {
            return redirect('/kriteria')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'nama_kriteria' => 'required|string',
            'jenis' => 'required|string',
            'attribut' => 'required|string',
            'bobot' => 'required|numeric',
        ], [
            'nama_kriteria.required' => 'Nama Kriteria Harus diisi',
            'jenis.required' => 'Jenis Harus diisi',
            'attribut.required' => 'Attribut Harus diisi',
            'bobot.required' => 'Bobot Harus diisi',
            'bobot.numeric' => 'Bobot Harus berisi dengan angka',
        ]);

        try {
            Kriteria::create($validatedData);
            return back()->with('success', 'Kriteria berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('kriteria.index')->with('gagal', 'Kriteria gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crips= Crips::where('kriteria_id', $id)->get();
        $kriteria = Kriteria::findOrFail($id);
        $pertanyaan = Pertanyaan::where('kriteria_id', $id)->get();
        $tpertanyaan = $pertanyaan->sum('bobot');
        
        $data = [
            'title' => 'Data Kriteria',
            'crips' => $crips,
            'kriteria' => $kriteria,
            'pertanyaan'=> $pertanyaan,
            'tpertanyaan'=> $tpertanyaan,
        ];
        return view('kriteria.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $kriteria = Kriteria::findOrFail($id);
            $data = [
                'title' => 'Edit Kriteria',
                'kriteria' => $kriteria,
            ];
            return view('kriteria.edit', $data);
        } catch (\Throwable $th) {
            return redirect('/kriteria')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'nama_kriteria' => 'required|string',
            'jenis' => 'required|string',
            'attribut' => 'required|string',
            'bobot' => 'required|numeric',
        ], [
            'nama_kriteria.required' => 'Nama Kriteria Harus diisi',
            'jenis.required' => 'Jenis Harus diisi',
            'attribut.required' => 'Attribut Harus diisi',
            'bobot.required' => 'Bobot Harus diisi',
            'bobot.numeric' => 'Bobot Harus berisi dengan angka',
        ]);

        try {
            Kriteria::where('id', $id)->update($validatedData);
            return redirect('/kriteria')->with('success', 'Kriteria berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect('/kriteria')->with('gagal', 'Kriteria gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Kriteria::destroy($id);
            $crips = Crips::where('kriteria_id', $id);
            $crips->delete();
        } catch (\Throwable $th) {
            return redirect('/kriteria')->with('gagal', 'Kriteria gagal dihapus');
        }
    }
}
