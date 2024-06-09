@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">Detail Permohonan Peminjaman</h2>
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
                        <div class="shadow rounded-md w-full mb-3">
                            <audio class="w-full" controls>
                                <source src="{{ asset('uploaded/' . $formPengajuan->instrument->audio) }}"
                                    type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                        </div>
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
                            <tr>
                                <td>Jumlah Tersedia</td>
                                <td class="w-1">:</td>
                                <td>{{ $totalTersedia }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <div class="card p-2">
                            <div class="flex justify-between item-center mb-3">
                                <h4>Permohonan</h4>
                                @if (auth()->user()->role == 'admin' && $formPengajuan->status == 'pending')
                                    <button class="btn btn-info btn-sm btn-tanggapi" data-bs-target="#exampleModal"
                                        data-bs-toggle="modal" id="{{ $formPengajuan->id }}" title="tanggapi permohonan">
                                        Tanggapi
                                    </button>
                                @endif
                            </div>
                            <div class="w-full mb-3">
                                <table class="table table-striped border border-gray-500">
                                    <tr>
                                        <td>Nama Pemohon</td>
                                        <td class="w-1">:</td>
                                        <td>
                                            {{ $formPengajuan->borrower->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Pemohon</td>
                                        <td class="w-1">:</td>
                                        <td>
                                            {{ $formPengajuan->borrower->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No. Telp</td>
                                        <td class="w-1">:</td>
                                        <td>
                                            {{ $formPengajuan->borrower->phone_number }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pemijanaman</td>
                                        <td class="w-1">:</td>
                                        <td>
                                            {{ $formPengajuan->borrowed_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pengembalian</td>
                                        <td class="w-1">:</td>
                                        <td>
                                            {{ $formPengajuan->returned_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Peminjaman</td>
                                        <td class="w-1">:</td>
                                        <td>
                                            {{ $formPengajuan->qty }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tujuan Peminjaman</td>
                                        <td class="w-1">:</td>
                                        <td>
                                            {{ $formPengajuan->purpose }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Catatan</td>
                                        <td class="w-1">:</td>
                                        <td>
                                            {{ $formPengajuan->notes }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Status Permohonan</td>
                                        <td class="w-1">:</td>
                                        <td>
                                            @if ($formPengajuan->status == 'pending')
                                                <div class="text-xs px-3 inline bg-gray-200 text-gray-800 rounded-full"
                                                    style="padding-top: 0.1em; padding-bottom: 0.1rem">Menunggu Tanggapan
                                                </div>
                                            @elseif ($formPengajuan->status == 'approved')
                                                <div class="text-xs px-3 inline bg-green-200 text-green-800 rounded-full"
                                                    style="padding-top: 0.1em; padding-bottom: 0.1rem">Disetujui</div>
                                            @elseif ($formPengajuan->status == 'borrowed')
                                                <div class="text-xs px-3 inline bg-blue-300 text-gray-100  rounded-full"
                                                    style="padding-top: 0.1em; padding-bottom: 0.1rem">Sedang Dipinjam</div>
                                            @elseif ($formPengajuan->status == 'rejected')
                                                <div class="text-xs px-3 inline bg-red-200 text-red-800 rounded-full"
                                                    style="padding-top: 0.1em; padding-bottom: 0.1rem">Ditolak</div>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            @if ($formPengajuan->status == 'returned')
                                <div class="flex justify-between item-center mb-3">
                                    <h4>Keterangan Pengembalian</h4>
                                </div>
                                <div class="w-full mb-3">
                                    <table class="table table-striped border border-gray-500">
                                        <tr>
                                            <td>Tanggal Pengembalian</td>
                                            <td class="w-1">:</td>
                                            <td>
                                                {{ $formPengajuan->pengembalianBarang->tanggal_pengembalian }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td class="w-1">:</td>
                                            <td>
                                                {{ $formPengajuan->pengembalianBarang->keterangan }}
                                            </td>
                                        </tr>
                                        {{-- jumlah yang dikembalikan --}}
                                        <tr>
                                            <td>Jumlah yang dikembalikan</td>
                                            <td class="w-1">:</td>
                                            <td>
                                                {{ $formPengajuan->pengembalianBarang->jumlah }}
                                            </td>
                                        </tr>
                                        {{-- jumlah bagus --}}
                                        <tr>
                                            <td>Jumlah Bagus</td>
                                            <td class="w-1">:</td>
                                            <td>
                                                {{ $formPengajuan->pengembalianBarang->jumlah_bagus }}
                                            </td>
                                        </tr>
                                        {{-- jumlah rusak --}}
                                        <tr>
                                            <td>Jumlah Rusak</td>
                                            <td class="w-1">:</td>
                                            <td>
                                                {{ $formPengajuan->pengembalianBarang->jumlah_rusak }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tanggapan Permohonan /nama</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body mb-3">
                    <form action="" id="form-tanggapan" method="post">
                        @csrf
                        <div class="w-full">
                            <label class="form-group" for="">
                                Catatan
                            </label>
                            <textarea class="form-control" id="catatan" name="catatan"></textarea>
                        </div>
                        {{-- button tanggapan approve or reject --}}
                        <div class="w-full mt-2 flex justify-end item-center">
                            <button class="btn w-[150px] btn-sm ml-1 mr-1 btn-success bgn-reponses" id="approved"
                                name="approved" type="submit">Setujui</button>
                            <button class="btn w-[150px] btn-sm ml-1 mr-1 btn-danger bgn-reponses" id="rejected"
                                name="rejected" type="submit">Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script>
        // actions approve or reject
        $(".btn-tanggapi").click(function() {
            var id = $(this).attr('id')
            $("#form-tanggapan").attr('action', `/used/update-status/${id}`)
        })
        $(".bgn-reponses").click(function() {
            var id = $(this).attr('id')
            $("#form-tanggapan").append(`<input type="hidden" name="status" value="${id}">`)
        })
    </script>
@endpush
