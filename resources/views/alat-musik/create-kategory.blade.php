@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">List Kategory</h2>
                <button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" type="button">
                    <i class="fa fa-plus ml-1"></i> Tambah
                </button>
            </div>
            <div class="card card-body shadow">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategory as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div class="flex items-center">
                                                <button class="mr-2 btn btn-primary editCategory"
                                                    data-bs-target="#exampleModal" data-bs-toggle="modal"
                                                    data-id="{{ $item->id }}" type="button">
                                                    <i class="fa fa-edit ml-1"></i>
                                                </button>
                                                {{-- destory --}}
                                                <form action="{{ url('alat-musik/destroy-kategory/' . $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger " type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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

                    <form action="{{ url('alat-musik/store-kategory') }}" method="post">
                        @csrf
                        <input id="id" name="id" type="hidden">
                        <input id="types_id" name="types_id" type="hidden" value="{{ $types_id }}">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label w-full" for="name">Nama</label>
                                <input class="form-control form-control-sm" id="name" name="name"
                                    placeholder="Masukkan nama kategory" required type="text">
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-save ml-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script script>
        $(".editCategory").click(function() {
            var id = $(this).data('id');
            $("#id").val(id);
        })
    </script>
@endpush
