@extends('layouts.app')
{{-- @section('title','Form Gudang') --}}
@section('content')
<form action="{{ route('product.store') }}" method="POST">
    {{-- token untuk biar engga error 401 --}}
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Data Produk</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                            placeholder="Masukkan Nama Produk" id="nama_produk" name="nama_produk"
                            value="{{ old('nama_produk') }}">
                        @error('nama_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="id_warna">Kategori Produk</label>
                        <select class="form-control @error('id_warna') is-invalid @enderror" 
                            name="id_warna" id="id_warna">
                            <option hidden>Pilih kategori</option>
                            <option disabled="disabled" default="true">Pilih kategori</option>
                            @foreach ($warna as $item)
                                <option value="{{ $item->id_warna }}"
                                    @if (old('id_warna') == $item->id_warna) selected @endif>{{ $item->warna }}
                                </option>
                                {{-- <option value="{{ $item->id }}">{{ }}</option> --}}
                            @endforeach
                        </select>
                        @error('id_warna')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="harga">Harga Produk</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror"
                            placeholder="Masukkan Harga Produk" id="harga" name="harga"
                            value="{{ old('harga') }}">
                        @error('harga')
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