<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
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
                'title' => 'Kelola User',
                'users' => User::all(),
            ];
            return view('user.index', $data);
        } catch (\Throwable $th) {
            return redirect('/user')->with('gagal', 'Halaman Gagal Diakses');
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
                'title' => 'Tambah User',
            ];
            return view('user.create', $data);
        } catch (\Throwable $th) {
            return redirect('/user')->with('gagal', 'Halaman Gagal Diakses');
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
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:4|max:255'
        ], [
            'name.required' => 'Nama Harus diisi',
            'username.required' => 'Username Harus diisi',
            'username.min' => 'Username Minimal 3 digit huruf / angka',
            'username.unique' => 'Username telah digunakan, buat username yang unik',
            'email.required' => 'Email Harus diisi',
            'email.unique' => 'Email telah digunakan, gunakan email yang lain',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password Minimal 4 digit huruf / angka',
        ]);

        try {
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::create($validatedData);
            return redirect('/user')->with('success', 'User berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/user')->with('gagal', 'User gagal ditambahkan');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        try {
            $data = [
                'title' => 'Ubah User',
                'user' => $user,
            ];
            return view('user.edit', $data);
        } catch (\Throwable $th) {
            return redirect('/user')->with('gagal', 'Halaman Gagal Diakses');
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
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:4|max:255'
        ], [
            'name.required' => 'Nama Harus diisi',
            'username.required' => 'Username Harus diisi',
            'username.min' => 'Username Minimal 3 digit huruf / angka',
            'username.unique' => 'Username telah digunakan, buat username yang unik',
            'email.required' => 'Email Harus diisi',
            'email.unique' => 'Email telah digunakan, gunakan email yang lain',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password Minimal 4 digit huruf / angka',
        ]);

        try {
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::where('id', $id)->update($validatedData);
            return redirect('/user')->with('success', 'User berhasil diubah');
        } catch (\Throwable $th) {
            return redirect('/user')->with('gagal', 'User gagal diubah');
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
            User::destroy($id);
        } catch (\Throwable $th) {
            return redirect('/user')->with('gagal', 'User gagal dihapus');
        }
    }
}
