@extends('layouts.app')
@section('content')
<form action="{{ route('gudang.update', $gudang->id_gudang) }}" method="POST">
    {{-- token untuk biar engga error 401 --}}
    @method('PUT')
    @csrf
    {{-- token untuk biar engga error 401 --}} 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Gudang</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_gudang">Nama Gudang</label>
                        <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" value="{{ old('nama_gudang', $gudang->nama_gudang) }}">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $gudang->lokasi) }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection