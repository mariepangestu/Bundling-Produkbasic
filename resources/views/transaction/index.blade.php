@extends('layouts.app')
{{-- @section('title', 'Data Gudang Clo Warehouse') --}}
<!-- Page Heading -->
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">DATA TRANSAKSI</h5>
        {{-- <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1> --}}
        <div>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#uploadModal">Upload Excel</button>
            <a href="{{ route('transaction.create') }}" class="btn btn-success btn-sm">Create</a>
            <a href="" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Cetak Data
            </a>
        </div>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
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
                            {{-- <th>Transaksi</th> --}}
                            <th>Nama Produk</th>
                            <th>Warna</th>
                            <th>Quantity</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualans as $penjualan)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> <!-- Menggunakan $loop->iteration untuk nomor urut --> --}}
                                <td>{{ $penjualan->produk['nama_produk'] }}</td>
                                <td>{{ $penjualan->warna['warna'] }}</td>
                                <td>{{ $penjualan->jumlah }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('transaction.edit', $penjualan->id_penjualan) }}" class="btn btn-warning mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('transaction.destroy', $penjualan->id_penjualan) }}" method="POST">
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

            <!-- Modal Upload Excel -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" name="file" accept=".xlsx, .xls" required class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
