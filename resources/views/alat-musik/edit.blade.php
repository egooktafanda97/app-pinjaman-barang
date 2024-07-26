@extends('layouts.app')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $("#sejarah").summernote({
            height: 150
        });
        $("#asal").summernote({
            height: 150
        });
        $("#sejarah").summernote("code", `{!! $alatMusik->history !!}`);
        $("#asal").summernote("code", `{!! $alatMusik->source !!}`);
    </script>
@endpush
@section('content')
    <div class="container">
        <div class="w-full p-2">

            <div class="card card-body shadow">
                <form action="{{ url('alat-musik/' . $alatMusik->id . '/update') }}" enctype="multipart/form-data"
                    method="post">
                    @csrf

                    {{-- <div class="flex justify-between w-full mb-2">
                        <h2 class="text-lg">Edit Data Alat Musik</h2>
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-save ml-1"></i> Simpan
                        </button>
                    </div> --}}
                    <input name="types_id" type="hidden" value="{{ $type ?? 1 }}">
                    <div class="flex justify-between w-full mb-2">
                        <h2 class="text-lg">Edit Data {{ $label ?? 'Alat Musik' }}</h2>
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-save ml-1"></i> Simpan
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="name">Nama</label>
                            <input class="form-control form-control-sm" id="name" name="name"
                                placeholder="Masukkan nama alat musik" required type="text"
                                value="{{ $alatMusik->name }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="description">Deskripsi</label>
                            <textarea class="form-control form-control-sm" id="description" name="description"
                                placeholder="Masukkan deskripsi alat musik" required rows="3">{{ $alatMusik->description }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="instrument_categories_id">Kategori Alat Musik</label>
                            <select class="form-select form-select-sm" id="instrument_categories_id"
                                name="instrument_categories_id" required>
                                <option value="">Pilih kategori</option>
                                @foreach ($kategory as $item)
                                    <option {{ $alatMusik->instrument_categories_id == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="origin">Asal</label>
                            <input class="form-control form-control-sm" id="origin" name="origin"
                                placeholder="Masukkan asal alat musik" required type="text"
                                value="{{ $alatMusik->origin }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="year">Tahun</label>
                            <input class="form-control form-control-sm" id="year" maxlength="4" name="year"
                                placeholder="Masukkan tahun pembuatan" required type="text"
                                value="{{ $alatMusik->year }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="material">Bahan</label>
                            <input class="form-control form-control-sm" id="material" name="material"
                                placeholder="Masukkan bahan pembuatan" required type="text"
                                value="{{ $alatMusik->material }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="availability">Jumlah Ketersediaan</label>
                            <input class="form-control form-control-sm" id="availability" name="availability"
                                placeholder="Masukkan jumlah ketersediaan" required type="number"
                                value="{{ $alatMusik->availability }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="availability">Jumlah Alat Bagus</label>
                            <input class="form-control form-control-sm" id="lendable" name="lendable"
                                placeholder="Masukkan jumlah ketersediaan bagus" required type="number"
                                value="{{ $alatMusik->lendable }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="availability">Jumlah Alat Rusak</label>
                            <input class="form-control form-control-sm" id="broken" name="broken"
                                placeholder="Masukkan jumlah ketersediaan rusak" required type="number"
                                value="{{ $alatMusik->broken }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="image">Gambar</label>
                            <input class="form-control form-control-sm" id="image" name="image"
                                placeholder="Masukkan URL gambar" type="file">
                            @if ($alatMusik->image)
                                <img alt="Gambar" class="mt-2" src="{{ asset('uploaded/' . $alatMusik->image) }}"
                                    width="100">
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="video">Video</label>
                            <input class="form-control form-control-sm" id="video" name="video"
                                placeholder="Masukkan URL video" type="file">
                            @if ($alatMusik->video)
                                <video class="mt-2" controls src="{{ asset('uploaded/' . $alatMusik->video) }}"
                                    width="100"></video>
                            @endif
                        </div>
                        @if ($type == 1)
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="audio">Audio</label>
                                <input class="form-control form-control-sm" id="audio" name="audio"
                                    placeholder="Masukkan URL audio" type="file">
                                @if ($alatMusik->audio)
                                    <audio class="mt-2" controls
                                        src="{{ asset('uploaded/' . $alatMusik->audio) }}"></audio>
                                @endif
                            </div>
                        @endif


                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="history">Sejarah</label>
                            <textarea class="form-control form-control-sm" id="sejarah" name="history"
                                placeholder="Masukkan sejarah alat musik" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="source">Sumber</label>
                            <textarea class="form-control form-control-sm" id="asal" name="source" placeholder="Masukkan sumber informasi"
                                rows="3"></textarea>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
