@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">Permohonan Peminjaman Alatmusik</h2>
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
                                <td>{{ $item->borrower->name }}</td>
                                <td>{{ $item->instrument->name }}</td>
                                <td>{{ $item->instrument->category->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td class="">
                                    <div class="flex justify-center item-center align-center h-full cursor-pointer"
                                        data-bs-target="#exampleModal" data-bs-toggle="modal"
                                        data-catatan="{{ $item->notes }}">
                                        @if ($item->status == 'pending')
                                            <div class="text-xs px-3 inline bg-gray-200 text-gray-800 rounded-full"
                                                style="padding-top: 0.1em; padding-bottom: 0.1rem">Menunggu Tanggapan</div>
                                        @elseif ($item->status == 'approved')
                                            <div class="text-xs px-3 inline bg-green-200 text-green-800 rounded-full"
                                                style="padding-top: 0.1em; padding-bottom: 0.1rem">Disetujui</div>
                                        @elseif ($item->status == 'rejected')
                                            <div class="text-xs px-3 inline bg-red-200 text-red-800 rounded-full"
                                                style="padding-top: 0.1em; padding-bottom: 0.1rem">Ditolak</div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="flex">
                                        @if ($item->status == 'pending')
                                            <a class="btn btn-warning btn-sm mr-1 ml-1"
                                                href="{{ url('/used/' . $item->id . '/edit-form-pengajuan') }}"
                                                title="edit pengajuan peminjaman">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm"
                                                href="{{ url('/used/' . $item->id . '/cencel-form-pengajuan/') }}"
                                                title="batal pengajuan peminjaman">
                                                <i class="fa fa-close"></i>
                                            </button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <p>catatan</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="
                                            https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js
                                            "></script>
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css
    " rel="stylesheet">
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
            $('.btn-danger').click(function(e) {
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
    </script>
@endpush
