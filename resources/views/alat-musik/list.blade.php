@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">List</h2>
            </div>
            <div class="card card-body shadow">
                {{-- card list img alatmusik --}}
                <div class="row">
                    @foreach ($alatMusik as $item)
                        <div class="col-md-3 mb-3">
                            <div class="bg-gray-50 p-1 rounded shadow-sm hover:shadow-xl cursor-pointer">
                                <img alt="Foto alat musik" class="w-100" src="{{ asset('uploaded/' . $item->image) }}">
                                <div class="card-body">
                                    {{-- name bold --}}
                                    <h5 class="card-title font-bold"><a
                                            href="{{ url("alat-musik/$item->id") }}">{{ $item->name }}</a></h5>
                                    {{-- button detail --}}
                                    {{-- jumlah tersedia --}}
                                    {{-- <p class="card-text">Jumlah Tersedia: {{ $item->stock }}</p> --}}
                                    {{-- harga --}}
                                    <hr class="mt-2 mb-2">
                                    <a class="btn btn-primary btn-sm w-100"
                                        href="{{ url('used/' . $item->id . '/form-pengajuan') }}">Ajukan peminjaman</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pngajuan Peminjaman</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    {{-- Form Pngajuan Peminjaman --}}

                </div>
            </div>
        </div>
    @endsection
