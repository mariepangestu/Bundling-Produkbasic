@extends('layouts.app')
@section('title','Form Gudang')
@section('content')
<form action="{{ route('gudang.store') }}" method="POST">
    {{-- token untuk biar engga error 401 --}}
    @csrf
    {{-- token untuk biar engga error 401 --}} 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Data Gudang</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_gudang">Nama Gudang</label>
                        <input type="text" class="form-control @error('nama_gudang') is-invalid @enderror" placeholder="Masukkan Nama Gudang" id="nama_gudang" name="nama_gudang" value="{{ old('nama_gudang') }}">
                        @error('nama_gudang')
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" placeholder="Masukkan Lokasi" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
                        @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
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