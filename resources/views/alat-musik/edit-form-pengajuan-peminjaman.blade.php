@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">From Pengajuan Peminjaman Alat Musik</h2>
            </div>
            <div class="card card-body shadow">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow rounded-lg w-full mb-3">
                            <img alt="{{ $alatMusik->name }}" class="img-fluid"
                                src="{{ asset('uploaded/' . $alatMusik->image) }}">
                        </div>
                        <br>
                        {{-- show vidio --}}
                        <div class="shadow rounded-md w-full mb-3">
                            <video class="w-full" controls>
                                <source src="{{ asset('uploaded/' . $alatMusik->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        {{-- show audio --}}
                        <div class="shadow rounded-md w-full mb-3">
                            <audio class="w-full" controls>
                                <source src="{{ asset('uploaded/' . $alatMusik->audio) }}" type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                        </div>
                        <table class="table table-striped border border-gray-500">
                            <tr>
                                <td>Nama</td>
                                <td class="w-1">:</td>
                                <td>{{ $alatMusik->name }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td class="w-1">:</td>
                                <td>{{ $alatMusik->description }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td class="w-1">:</td>
                                <td>{{ $alatMusik->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Asal</td>
                                <td class="w-1">:</td>
                                <td>{{ $alatMusik->origin }}</td>
                            </tr>
                            <tr>
                                <td>Tahun</td>
                                <td class="w-1">:</td>
                                <td>{{ $alatMusik->year }}</td>
                            </tr>
                            <tr>
                                <td>Bahan</td>
                                <td class="w-1">:</td>
                                <td>{{ $alatMusik->material }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Tersedia</td>
                                <td class="w-1">:</td>
                                <td>{{ $alatMusik->availability -\App\Models\InstrumentBorrowal::where('instrument_id', $alatMusik->id)->whereStatus('borrowed')->count() }}
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-8">
                        <div class="card p-2">
                            <form action="{{ url('used/' . $alatMusik->id . '/form-pengajuan/' . $id) }}" method="post">
                                @csrf
                                <input name="" type="hidden">
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="">Nama Peminjam</label>
                                    <input class="form-control form-control-sm" disabled id="" name=""
                                        type="text" value="{{ $brorrower->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="">Alat Musik</label>
                                    <input class="form-control form-control-sm" id="" disabled type="text""
                                        value="{{ $alatMusik->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="borrowed_at">Tanggal Peminjaman</label>
                                    <input class="form-control form-control-sm" id="borrowed_at" name="borrowed_at"
                                        type="date" value="{{ old('borrowed_at', $formPengajuan->borrowed_at) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="returned_at">Tanggal Pengembalian</label>
                                    <input class="form-control form-control-sm" id="returned_at" name="returned_at"
                                        type="date" value="{{ old('returned_at', $formPengajuan->returned_at) }}">
                                </div>
                                {{-- jumlah peminjaman --}}
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="qty">Jumlah Peminjaman</label>
                                    <input class="form-control form-control-sm" id="qty" name="qty" type="number"
                                        value="{{ $formPengajuan->qty }}">
                                </div>
                                {{-- tujuan peminjaman --}}
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="purpose">Tujuan Peminjaman</label>
                                    <textarea class="form-control form-control-sm" id="purpose" name="purpose" rows="3">{{ $formPengajuan->purpose }}</textarea>
                                </div>
                                {{-- simpan --}}
                                <div class="mb-3 flex justify-end">
                                    <button class="btn btn-success btn-sm" type="submit">Ajukan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
