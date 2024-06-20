@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full p-2">
            <div class="flex justify-between w-full mb-2">
                <h2 class="text-lg">{{ $label ?? '' }}</h2>
                <a class="btn btn-primary" href="{{ url('alat-musik/create/' . $segement) }}">
                    <i class="fa fa-plus mr-1"></i> Tambah
                </a>
            </div>
            <div class="card card-body shadow">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama Nama pakaian</th>
                            <th>Deskripsi</th>
                            <th>pakaian</th>
                            <th>Tahun</th>
                            <th>Bahan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Nama pakaian</th>
                            <th>Deskripsi</th>
                            <th>pakaian</th>
                            <th>Tahun</th>
                            <th>Bahan</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($alatMusik as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->origin }}</td>
                                <td>{{ $item->year }}</td>
                                <td>{{ $item->material }}</td>
                                <td>
                                    <div class="flex item-center">
                                        <a class="btn btn-info btn-sm" href="{{ url('alat-musik/' . $item->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ url('alat-musik/' . $item->id . '/edit' . ($segement != null ? '/pakaian' : '')) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ url('alat-musik/' . $item->id . '/delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
