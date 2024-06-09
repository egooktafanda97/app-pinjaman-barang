@extends('layouts.app')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(function() {
            $("#sejarah").summernote({
                height: 150
            });
            $("#asal").summernote({
                height: 150
            });
        })
    </script>
@endpush
@section('content')
    <div class="container">
        <div class="w-full p-2">

            <div class="card card-body shadow">
                <form action="{{ url('alat-musik/store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="flex justify-between w-full mb-2">
                        <h2 class="text-lg">Tambahkan Data Alat Musik</h2>
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-save ml-1"></i> Simpan
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="name">Nama</label>
                            <input class="form-control form-control-sm" id="name" name="name"
                                placeholder="Masukkan nama alat musik" required type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="description">Deskripsi</label>
                            <textarea class="form-control form-control-sm" id="description" name="description"
                                placeholder="Masukkan deskripsi alat musik" required rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="instrument_categories_id">Kategori Alat Musik</label>
                            <select class="form-select form-select-sm" id="instrument_categories_id"
                                name="instrument_categories_id" required>
                                <option value="">Pilih kategori</option>
                                @foreach ($kategory as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="origin">Asal</label>
                            <input class="form-control form-control-sm" id="origin" name="origin"
                                placeholder="Masukkan asal alat musik" required type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="year">Tahun</label>
                            <input class="form-control form-control-sm" id="year" maxlength="4" name="year"
                                placeholder="Masukkan tahun pembuatan" required type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="material">Bahan</label>
                            <input class="form-control form-control-sm" id="material" name="material"
                                placeholder="Masukkan bahan pembuatan" required type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="availability">Jumlah Ketersediaan</label>
                            <input class="form-control form-control-sm" id="availability" name="availability"
                                placeholder="Masukkan jumlah ketersediaan" required type="number" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="availability">Jumlah Alat Bagus</label>
                            <input class="form-control form-control-sm" id="lendable" name="lendable"
                                placeholder="Masukkan jumlah ketersediaan" required type="number" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="availability">Jumlah Alat Rusak</label>
                            <input class="form-control form-control-sm" id="broken" name="broken"
                                placeholder="Masukkan jumlah ketersediaan" required type="number" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="image">Gambar</label>
                            <input class="form-control form-control-sm" id="image" name="image"
                                placeholder="Masukkan URL gambar" type="file">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="video"> Video</label>
                            <input class="form-control form-control-sm" id="video" name="video"
                                placeholder="Masukkan URL video" type="file">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="audio">Audio</label>
                            <input class="form-control form-control-sm" id="audio" name="audio"
                                placeholder="Masukkan URL audio" type="file">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="history">Sejarah</label>
                            <textarea class="form-control form-control-sm" id="sejarah" id="history" name="history"
                                placeholder="Masukkan sejarah alat musik"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="source">Sumber</label>
                            <textarea class="form-control form-control-sm" id="asal" name="source"
                                placeholder="Masukkan sumber informasi"></textarea>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
