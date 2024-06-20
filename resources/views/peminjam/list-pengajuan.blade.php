@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">
                    {{ $title ?? 'Pengambilan alatmusik yang sudah disetujui' }}
                </h2>
            </div>
            <div class="card card-body shadow">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama Pemohon</th>
                            <th>Nama Alatmusik</th>
                            <th>Kategori</th>
                            <th>Jumlah Diajukan</th>
                            <th>Staus Permohonan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>Nama Alatmusik</th>
                            <th>Kategori</th>
                            <th>Jumlah Diajukan</th>
                            <th>Tanggal pengajuan</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Staus Permohonan</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($listPengajuan as $item)
                            <tr>
                                <td>
                                    <a class="text-blue-500"
                                        href="{{ url('users-used/profile/' . $item->borrower->user_id) }}">{{ $item->borrower->name }}</a>
                                </td>
                                <td>{{ $item->instrument->name }}</td>
                                <td>{{ $item->instrument->category->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td class="">
                                    <div class="flex justify-center item-center align-center h-full cursor-pointer"
                                        data-catatan="{{ $item->notes }}">
                                        @if ($item->status == 'pending')
                                            <div class="text-xs px-3 inline bg-gray-200 text-gray-800 rounded-full"
                                                style="padding-top: 0.1em; padding-bottom: 0.1rem">Menunggu Tanggapan</div>
                                        @elseif ($item->status == 'approved')
                                            <div class="text-xs px-3 inline bg-green-200 text-green-800 rounded-full"
                                                style="padding-top: 0.1em; padding-bottom: 0.1rem">Disetujui</div>
                                        @elseif ($item->status == 'borrowed')
                                            <div class="text-xs px-3 inline bg-blue-300 text-gray-100  rounded-full"
                                                style="padding-top: 0.1em; padding-bottom: 0.1rem">Sedang Dipinjam</div>
                                        @elseif ($item->status == 'rejected')
                                            <div class="text-xs px-3 inline bg-red-200 text-red-800 rounded-full"
                                                style="padding-top: 0.1em; padding-bottom: 0.1rem">Ditolak</div>
                                        @elseif ($item->status == 'returned')
                                            <div class="text-xs px-3 inline bg-green-200 text-green-900 rounded-full"
                                                style="padding-top: 0.1em; padding-bottom: 0.1rem">Telah Dikembalikan</div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="flex">
                                        {{-- detail --}}
                                        <a class="btn btn-info btn-sm mr-1 ml-1"
                                            href="{{ url('/used/list-permohonan-detail/' . $item->id) }}"
                                            title="detail pengajuan peminjaman">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if (auth()->user()->role != 'admin' && $item->status == 'pending')
                                            <a class="btn btn-warning btn-sm mr-1 ml-1"
                                                href="{{ url('/used/' . $item->id . '/edit-form-pengajuan') }}"
                                                title="edit pengajuan peminjaman">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-removes btn-sm"
                                                href="{{ url('/used/' . $item->id . '/cencel-form-pengajuan/') }}"
                                                title="batal pengajuan peminjaman">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        @endif
                                        {{-- auth()->user()->role == 'admin' &&  --}}
                                        @if (auth()->user()->role == 'admin' && $item->status == 'pending')
                                            <button class="btn btn-info btn-sm btn-tanggapi" data-bs-target="#exampleModal"
                                                data-bs-toggle="modal" id="{{ $item->id }}"
                                                title="tanggapi permohonan">
                                                Tanggapi
                                            </button>
                                        @endif
                                        @if (auth()->user()->role == 'admin' && $item->status == 'approved')
                                            <form action='{{ url("/used/update-status/$item->id") }}' method="post">
                                                @csrf
                                                <input name="direction" type="hidden" value="used/list-pengambilan">
                                                <input name="status" type="hidden" value="borrowed">
                                                <button class="btn btn-info btn-sm" type="submit">
                                                    Telah Dipinjam Pemohon
                                                </button>
                                            </form>
                                        @endif
                                        @if (auth()->user()->role == 'admin' && $item->status == 'borrowed')
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ url('used/form-pengembalian-barang/' . $item->id) }}"
                                                href="">Pengembalian</a>
                                        @endif
                                    </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
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
        var myModal = document.getElementById('exampleModal')
        myModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var catatan = button.getAttribute('data-catatan')
            var modalBodyInput = myModal.querySelector('.modal-body p')
            modalBodyInput.textContent = catatan
        })
        // sweet alert for batal permohonan 
        $(document).ready(function() {
            $('.btn-removes').click(function(e) {
                e.preventDefault()
                var href = $(this).attr('href')
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Permohonan akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href
                    }
                })
            })
        })

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
