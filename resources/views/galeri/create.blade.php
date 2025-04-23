@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <h2>Tambah Galeri</h2>
</div>

<form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}" required>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
