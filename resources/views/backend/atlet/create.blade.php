@extends('backend.layouts.app')

@section('title', 'Tambah Atlet')

@section('content')
<div class="card">
    <div class="card-header">
       <h2>Tambah Atlet</h2> 
    </div>
    <div class="card-body">
        <form action="{{ route('backend.atlet.store') }}" method="POST" enctype="multipart/form-data">
       
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="prestasi" class="form-label">Prestasi</label>
                <textarea class="form-control" id="prestasi" name="prestasi">{{ old('prestasi') }}</textarea>
            </div>


            <div class="mb-3">
                <label for="rekap_latihan" class="form-label">rekap Latihan</label>
                <textarea class="form-control" id="rekap_latihan" name="rekap_latihan">{{ old('rekap_latihan') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>
</div>
@endsection