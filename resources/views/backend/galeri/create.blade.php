@extends('layouts.appgaleri')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white fw-bold">
                Tambah Galeri
            </div>
            <div class="card-body">

                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
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
                    <a href="{{ route('galeri.index') }}" class="btn btn-warning">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
