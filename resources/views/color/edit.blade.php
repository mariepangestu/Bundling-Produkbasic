@extends('layouts.app')
@section('content')
<form action="{{ route('color.update', $warna->id_warna) }}" method="POST">
    {{-- token untuk biar engga error 401 --}}
    @csrf
    @method('PUT')
    {{-- token untuk biar engga error 401 --}} 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Warna</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" class="form-control" id="warna" name="warna" 
                        value="{{ old('warna', $warna->warna) }}">
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