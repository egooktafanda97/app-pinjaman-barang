@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">From Pengajuan Peminjaman</h2>
            </div>
            <div class="card card-body shadow">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow rounded-lg w-full mb-3">
                            <img alt="{{ $formPengajuan->instrument->name }}" class="img-fluid"
                                src="{{ asset('uploaded/' . $formPengajuan->instrument->image) }}">
                        </div>
                        <br>
                        {{-- show vidio --}}
                        <div class="shadow rounded-md w-full mb-3">
                            <video class="w-full" controls>
                                <source src="{{ asset('uploaded/' . $formPengajuan->instrument->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        {{-- show audio --}}
                        @if ($formPengajuan->types_id == 1)
                            <div class="shadow rounded-md w-full mb-3">
                                <audio class="w-full" controls>
                                    <source src="{{ asset('uploaded/' . $formPengajuan->instrument->audio) }}"
                                        type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                            </div>
                        @endif

                        <table class="table table-striped border border-gray-500">
                            <tr>
                                <td>Nama</td>
                                <td class="w-1">:</td>
                                <td>{{ $formPengajuan->instrument->name }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td class="w-1">:</td>
                                <td>{{ $formPengajuan->instrument->description }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td class="w-1">:</td>
                                <td>{{ $formPengajuan->instrument->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Asal</td>
                                <td class="w-1">:</td>
                                <td>{{ $formPengajuan->instrument->origin }}</td>
                            </tr>
                            <tr>
                                <td>Tahun</td>
                                <td class="w-1">:</td>
                                <td>{{ $formPengajuan->instrument->year }}</td>
                            </tr>
                            <tr>
                                <td>Bahan</td>
                                <td class="w-1">:</td>
                                <td>{{ $formPengajuan->instrument->material }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <div class="card p-2">
                            <form action="{{ url('used/' . $id . '/form-pengembalian') }}" method="post">
                                @csrf
                                <input name="" type="hidden">
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="">Nama Peminjam</label>
                                    <input class="form-control form-control-sm" disabled id="" name=""
                                        type="text" value="{{ $formPengajuan->borrower->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="">Alat Musik</label>
                                    <input class="form-control form-control-sm" disabled id="" type="text""
                                        value="{{ $formPengajuan->instrument->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="borrowed_at">Tanggal Peminjaman</label>
                                    <input class="form-control form-control-sm" disabled id="borrowed_at" name="borrowed_at"
                                        type="date" value="{{ $formPengajuan->borrowed_at }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="returned_at">Tanggal Pengembalian Saat
                                        Permohonan</label>
                                    <input class="form-control form-control-sm" disabled id="returned_at" name="returned_at"
                                        type="date" value="{{ $formPengajuan->returned_at }}">
                                </div>
                                {{-- jumlah peminjaman --}}
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="qty">Jumlah Peminjaman</label>
                                    <input class="form-control form-control-sm" disabled id="qty" name="qty"
                                        type="number" value="{{ $formPengajuan->qty }}">
                                </div>
                                {{-- tujuan peminjaman --}}
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="purpose">Tujuan Peminjaman</label>
                                    <textarea class="form-control form-control-sm" disabled id="purpose" name="purpose" rows="3">{{ $formPengajuan->purpose }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="purpose">Keterangan pengembalian</label>
                                    <textarea class="form-control form-control-sm" id="keterangan" name="keterangan" rows="3"></textarea>
                                </div>
                                {{-- tanggal readonly --}}
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="returned_at">Tanggal Pengembalian</label>
                                    <input class="form-control form-control-sm" id="tanggal" name="tanggal" type="date"
                                        value="{{ date('Y-m-d') }}">
                                </div>
                                {{-- jumlah --}}
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="qty">Jumlah Yang Dikembalian</label>
                                    <input class="form-control form-control-sm" id="jumlah" name="jumlah"
                                        type="number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="qty">Jumlah Bagus</label>
                                    <input class="form-control form-control-sm" id="jumlah_bagus" name="jumlah_bagus""
                                        type="number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-bold" for="qty">Jumlah Rusak</label>
                                    <input class="form-control form-control-sm" id="jumlah_rusak" name="jumlah_rusak"
                                        type="number">
                                </div>
                                {{-- simpan --}}
                                <div class="mb-3 flex justify-end">
                                    <button class="btn btn-primary btn-sm" type="submit">Barang Dikembalikan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
