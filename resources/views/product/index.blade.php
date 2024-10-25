@extends('layouts.app')
{{-- @section('title', 'Data Gudang Clo Warehouse') --}}
<!-- Page Heading -->
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">DATA PRODUK</h5>
        {{-- <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1> --}}
        <div>
            <a href="{{ route('product.create') }}" class="btn btn-success btn-sm">Create</a>
            <a href="" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak Data</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk Basic</h6>
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
                            <th>Nama Produk</th>
                            <th>Warna</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                            <tr>
                                {{-- <td>{{ $loop->index + 1 }}</td> --}}
                                {{-- <td>{{ $produk->id_produk }}</td> --}}
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->warna['warna'] }}</td>
                                <td>{{ $produk->harga }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('product.edit', $produk->id_produk) }}" class="btn btn-warning mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('product.destroy', $produk->id_produk) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin Ingin Dihapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
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