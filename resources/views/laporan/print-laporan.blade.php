<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .kop-surat {
            display: flex;
            align-items: center;
            position: relative;
            padding-bottom: 10px;
        }

        .logo {
            width: 100px;
            top: 0;
            position: absolute;
            /* Adjust the width as needed */
            /* height: auto; */
            margin-right: 20px;
        }

        .kop-teks {
            text-align: center;
            flex: 1;
        }

        .kop-teks h1,
        .kop-teks h2 {
            margin: 0;
        }

        hr {
            border: 1px solid black;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            font-size: .8em;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot {
            background-color: #f2f2f2;
        }

        .image-grid {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly !important;
            justify-items: center;
            /* Untuk mengompensasi margin pada gambar */
        }

        .image-grid img {
            margin-top: 10px;
            height: 150px;
            padding-top: 10px;
            width: 19%;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <div class="kop-teks">
            <h3 style="margin: 0px;">DINAS KEBUDAYAAN DAN PARIWISATA</h3>
            <h4 style="margin: 0px;">Kabupaten Kuatan Singingi</h4>

        </div>
    </div>
    <hr>

    <h4>Laporan Peminjaman Alat Musik Tradisional</h4>
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Nama Pemohon</th>
                <th>Nama Alatmusik</th>
                <th>Kategori</th>
                <th>Jumlah Diajukan</th>
                <th>Tanggal pengajuan</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Permohonan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listPengajuan as $item)
                <tr>
                    <td>
                        <a class="text-blue-500" href="{{ url('user-used/profile') }}">{{ $item->borrower->name }}</a>
                    </td>
                    <td>{{ $item->instrument->name }}</td>
                    <td>{{ $item->instrument->category->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->borrowed_at }}</td>
                    <td>{{ $item->returned_at }}</td>
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

                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
