@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Data User</h1>
        </div>
        <div class="section-body">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div
                            class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>User</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/user/{{ $user->id }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input id="name" type="text"
                                                class="form-control rounded-top @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input id="username" type="text"
                                                class="form-control rounded-top @error('username') is-invalid @enderror"
                                                name="username" value="{{ old('username', $user->username) }}">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="email"
                                                class="form-control rounded-top @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password"
                                                class="form-control pwstrength  rounded-top @error('password') is-invalid @enderror"
                                                data-indicator="pwindicator" name="password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Ubah
                                            </button>
                                            <a href="/user"class="btn btn-danger btn-lg btn-block">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endSection
