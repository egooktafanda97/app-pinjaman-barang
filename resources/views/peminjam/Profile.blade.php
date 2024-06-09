@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">User {{ auth()->user()->name }}</h2>
            </div>
            <div class="card card-body shadow">
                <div class="row">
                    @if (!empty($borrower))
                        <div class="col-md-4 mb-3">
                            {{-- foto --}}
                            <div class="w-100">
                                <img alt="Foto peminjam" class="w-100" src="{{ asset('uploaded/' . $borrower->foto) }}">
                            </div>
                        </div>
                    @endif
                    <div class="{{ empty($borrower) ? 'col-md-12' : 'col-md-8' }}">
                        <form action="{{ url('users-used/profile/store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="name">Nama</label>
                                    <input class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Masukkan nama peminjam" required
                                        type="text" value="{{ old('name', $borrower->name ?? '') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="phone_number">Nomor Telepon</label>
                                    <input class="form-control form-control-sm @error('phone_number') is-invalid @enderror"
                                        id="phone_number" name="phone_number" placeholder="Masukkan nomor telepon peminjam"
                                        required type="text"
                                        value="{{ old('phone_number', $borrower->phone_number ?? '') }}">
                                    @error('phone_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="address">Alamat</label>
                                    <input class="form-control form-control-sm @error('address') is-invalid @enderror"
                                        id="address" name="address" placeholder="Masukkan alamat peminjam" type="text"
                                        value="{{ old('address', $borrower->address ?? '') }}">
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="birthdate">Tanggal Lahir</label>
                                    <input class="form-control form-control-sm @error('birthdate') is-invalid @enderror"
                                        id="birthdate" name="birthdate" placeholder="Masukkan tanggal lahir peminjam"
                                        type="date" value="{{ old('birthdate', $borrower->birthdate ?? '') }}">
                                    @error('birthdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="occupation">Pekerjaan</label>
                                    <input class="form-control form-control-sm @error('occupation') is-invalid @enderror"
                                        id="occupation" name="occupation" placeholder="Masukkan pekerjaan peminjam"
                                        type="text" value="{{ old('occupation', $borrower->occupation ?? '') }}">
                                    @error('occupation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="gender">Jenis Kelamin</label>
                                    <select class="form-select form-select-sm @error('gender') is-invalid @enderror"
                                        id="gender" name="gender">
                                        <option value="">Pilih jenis kelamin</option>
                                        <option {{ old('gender', $borrower->gender ?? '') == 'male' ? 'selected' : '' }}
                                            value="male">Laki-laki</option>
                                        <option {{ old('gender', $borrower->gender ?? '') == 'female' ? 'selected' : '' }}
                                            value="female">Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="foto">Foto</label>
                                    <input {{ empty($borrower->foto) ? 'required' : '' }}
                                        class="form-control form-control-sm @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" type="file">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
