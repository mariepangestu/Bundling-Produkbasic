@extends('layouts.app')
{{-- @section('title', 'Data Gudang Clo Warehouse') --}}
<!-- Page Heading -->
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <div>
            <a href="" class="btn btn-success btn-sm">Import</a>
            <a href="{{ route('color.create') }}" class="btn btn-success btn-sm">Create</a>
            <a href="" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak Data</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Warna Produk Basic</h6>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert" id="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Warna</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warnas as $warna)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                {{-- <td>{{ $warna->id_warna }}</td> --}}
                                <td>{{ $warna->warna }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('color.edit', $warna->id_warna) }}"
                                        class="btn btn-warning mr-2">Update</a>
                                    {{-- <a href="{{ route('gudang.destroy',$gudang->id_gudang) }}" class="btn btn-danger">Delete</a> --}}
                                    <form action="{{ route('color.destroy', $warna->id_warna) }}" method="POST">
                                        {{-- cross site ruquest forgery memverifikasi bahwa pengguna yang membuat permintaan --}}
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin Ingin Dihapus?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection