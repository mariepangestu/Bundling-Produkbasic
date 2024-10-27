@extends('layouts.app')
@section('content')
    <form action="{{ route('product.update', $produk->id_produk) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Produk</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                value="{{ old('nama_produk', $produk->nama_produk) }}">
                            <label for="id_warna">Kategori Barang</label>
                            <select class="form-control" name="id_warna" id="id_warna">
                                <option hidden>Pilih kategori</option>
                                <option disabled="disabled" default="true">Pilih kategori</option>
                                @foreach ($warna as $item)
                                    <option value="{{ $item->id_warna }}"
                                        {{ $item->id_warna == $produk->id_warna ? 'selected' : '' }}>
                                        {{ $item->warna }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="harga">Harga Produk</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                                value="{{ old('harga', $produk->harga) }}">
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