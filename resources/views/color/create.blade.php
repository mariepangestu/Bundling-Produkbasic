@extends('layouts.app')
@section('title','Form Warna Produk Basic')
@section('content')
<form action="{{ Route('color.store') }}" method="POST">
    {{-- token untuk biar engga error 401 --}}
    @csrf
    {{-- token untuk biar engga error 401 --}} 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Data Warna</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="warna">Warna Produk</label>
                        <input type="text" class="form-control @error('warna') is-invalid @enderror" placeholder="Masukkan Warna" id="warna" name="warna" value="{{ old('warna') }}">
                        @error('warna')
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