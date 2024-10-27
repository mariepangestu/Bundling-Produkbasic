@extends('layouts.app')

@section('content')
<form action="{{ route('transaction.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Data Penjualan</h6>
                </div>
                <div class="card-body">
                    <div id="products-container">
                        <div class="form-group product-item">
                            <label for="id_produk_0">Produk</label>
                            <select class="form-control @error('id_produk.*') is-invalid @enderror" 
                                name="id_produk[]" id="id_produk_0">
                                <option hidden>Pilih Jenis Produk</option>
                                @foreach ($produk as $item)
                                    <option value="{{ $item->id_produk }}"
                                        @if (old('id_produk.0') == $item->id_produk) selected @endif>{{ $item->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_produk.*')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="id_warna_0">Warna</label>
                            <select class="form-control @error('id_warna.*') is-invalid @enderror" 
                                name="id_warna[]" id="id_warna_0">
                                <option hidden>Pilih Warna</option>
                                @foreach ($warna as $item)
                                    <option value="{{ $item->id_warna }}"
                                        @if (old('id_warna.0') == $item->id_warna) selected @endif>{{ $item->warna }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_warna.*')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="jumlah_0">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah.*') is-invalid @enderror"
                                placeholder="Masukkan Jumlah" id="jumlah_0" name="jumlah[]" 
                                value="{{ old('jumlah.0') }}">
                            @error('jumlah.*')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger remove-product mt-3" style="display:none;">Hapus Produk</button>
                    <button type="button" class="btn btn-primary mt-3" id="addProduct">Tambah Produk</button>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

@section('scripts')
<script>
    document.getElementById('addProduct').addEventListener('click', function() {
        const container = document.getElementById('products-container');
        const index = container.children.length; // Hitung jumlah produk yang sudah ada

        // Membuat elemen baru untuk produk
        const newProduct = document.createElement('div');
        newProduct.classList.add('form-group', 'product-item');
        newProduct.innerHTML = `
            <label for="id_produk_${index}">Produk</label>
            <select class="form-control @error('id_produk.*') is-invalid @enderror" 
                name="id_produk[]" id="id_produk_${index}">
                <option hidden>Pilih Jenis Produk</option>
                @foreach ($produk as $item)
                    <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
                @endforeach
            </select>
            <label for="id_warna_${index}">Warna</label>
            <select class="form-control @error('id_warna.*') is-invalid @enderror" 
                name="id_warna[]" id="id_warna_${index}">
                <option hidden>Pilih Warna</option>
                @foreach ($warna as $item)
                    <option value="{{ $item->id_warna }}">{{ $item->warna }}</option>
                @endforeach
            </select>
            <label for="jumlah_${index}">Jumlah</label>
            <input type="number" class="form-control @error('jumlah.*') is-invalid @enderror"
                placeholder="Masukkan Jumlah" id="jumlah_${index}" name="jumlah[]" 
                value="">
        `;
        container.appendChild(newProduct);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-product')) {
            e.target.closest('.product-item').remove();
        }
    });
</script>
@endsection
@endsection
