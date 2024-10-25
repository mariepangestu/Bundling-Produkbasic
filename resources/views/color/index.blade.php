@extends('layouts.app')
{{-- @section('title', 'Data Gudang Clo Warehouse') --}}

<!-- Page Heading -->
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">DATA WARNA</h5>
        <div>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#uploadModal">Upload Excel</button>
            <a href="{{ route('color.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus fa-sm text-white-50 mr-1"></i>Tambah Data
            </a>            
            <a href="" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Cetak Data
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        
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
                            {{-- Kolom No dihilangkan jika tidak digunakan --}}
                            <th class="text-center">Warna</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warnas as $warna)
                            <tr>
                                {{-- Data warna --}}
                                <td class="text-center">{{ $warna->warna }}</td>

                                {{-- Aksi edit dan delete --}}
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('color.edit', $warna->id_warna) }}" class="btn btn-warning mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('color.destroy', $warna->id_warna) }}" method="POST">
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
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
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
