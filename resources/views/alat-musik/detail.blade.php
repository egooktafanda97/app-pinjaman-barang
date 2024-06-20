@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">{{ $alatMusik->types_id == 1 ? 'Alat Musik' : 'Pakaian Adat' }} {{ $alatMusik->name }}
                </h2>
            </div>
            <div class="card card-body shadow">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow rounded-md w-full mb-3">
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
                        @if ($alatMusik->type_id == 1)
                            <div class="shadow rounded-md w-full mb-3">
                                <audio class="w-full" controls>
                                    <source src="{{ asset('uploaded/' . $alatMusik->audio) }}" type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="w-full">
                            {{-- show detail alat musik table border key value --}}
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
                            </table>
                        </div>
                        <div class="w-full">
                            {{-- 2 card widget count jumlah tersedia dan jumlah dipinjam --}}
                            <div class="flex justify-between w-full">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card bg-primary w-full text-white mb-4 ml-2 mr-2">
                                            <div class="card-body">
                                                {{ $alatMusik->availability }}
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <span class="small text-white stretched-link">Jumlah Tersedia</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-info w-full text-white mb-4 ml-2 mr-2">
                                            <div class="card-body">
                                                {{ $alatMusik->lendable }}
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <span class="small text-white stretched-link">Jumlah Bagus</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-danger w-full text-white mb-4 ml-2 mr-2">
                                            <div class="card-body">
                                                {{ $alatMusik->broken }}
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <span class="small text-white stretched-link">Jumlah Rusak</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card bg-warning w-full text-white mb-4 ml-2 mr-2">
                                            <div class="card-body">
                                                {{ $dipinjamkan }}
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <span class="small text-white stretched-link">Jumlah Dipinjam</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card bg-warning w-full text-white mb-4 ml-2 mr-2">
                                            <div class="card-body">
                                                {{ $jumlah_tersedia }}
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <span class="small text-white stretched-link">Jumlah Tersedia
                                                    Dipinjamkan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
