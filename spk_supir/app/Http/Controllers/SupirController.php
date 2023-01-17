<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Supir;
use Illuminate\Http\Request;

class SupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = [
                'title' => 'Kelola Supir',
                'supir' => Supir::all(),
            ];
            return view('supir.index', $data);
        } catch (\Throwable $th) {
            return redirect('/supir')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $data = [
                'title' => 'Tambah Supir',
            ];
            return view('supir.create', $data);
        } catch (\Throwable $th) {
            return redirect('/supir')->with('gagal', 'Halaman Gagal Diakses');
        }
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
            'nama' => 'required|min:3|unique:supir',
            'lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|min:4',
            'hp' => 'required|min:6',

        ], [
            'nama.required' => 'Nama Lengkap Harus diisi',            
            'nama.unique' => 'Nama Supir telah digunakan, tambahkan simbol',
            'nama.min' => 'Nama minimal 3 digit huruf',
            'lahir.required' => 'Tempat Lahir Harus diisi',
            'tgl_lahir.required' => 'Tanggal Lahir Harus diisi',
            'alamat.required' => 'Alamat Harus diisi',
            'alamat.min' => 'Alamat minimal 3 digit huruf ataupun angka',
            'hp.required' => 'No. Hp Harus diisi',
            'hp.min' => 'No. Hp minimal 6 digit angka',
        ]);

        try {
            Supir::create($validatedData);
            return redirect('/supir')->with('success', 'Supir berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/supir')->with('gagal', 'Supir gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function show(Supir $supir)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function edit(Supir $supir)
    {
        try {
            $data =  [
                'title' => 'Ubah Supir',
                'supir' => $supir,
            ];
            return view('supir.edit', $data);
        } catch (\Throwable $th) {
            return redirect('/supir')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supir $supir)
    {
        $validatedData = $this->validate($request, [
            'nama' => 'required|min:3',
            'lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|min:4',
            'hp' => 'required|min:6',

        ], [
            'nama.required' => 'Nama Lengkap Harus diisi',
            'nama.min' => 'Nama minimal 3 digit huruf',
            'lahir.required' => 'Tempat Lahir Harus diisi',
            'tgl_lahir.required' => 'Tanggal Lahir Harus diisi',
            'alamat.required' => 'Alamat Harus diisi',
            'alamat.min' => 'Alamat minimal 3 digit huruf ataupun angka',
            'hp.required' => 'No. Hp Harus diisi',
            'hp.min' => 'No. Hp minimal 6 digit angka',
        ]);
        try {
            Supir::where('id_supir', $supir->id_supir)->update($validatedData);
            return redirect('/supir')->with('success', 'Supir berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect('/supir')->with('gagal', 'Supir gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Supir::destroy($id);
        } catch (\Throwable $th) {
            return redirect('/supir')->with('gagal', 'Supir gagal dihapus');
        }
    }
}
