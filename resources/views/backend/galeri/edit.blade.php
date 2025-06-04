@extends('backend.layouts.app')

@section('content')
    <div class="text-center mb-4">
        <h2>Edit Galeri</h2>
    </div>

    <form action="{{ route('backend.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}"
                required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Baru (Opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gambar Saat Ini:</label><br>
            <img src="{{ asset('uploads/' . $galeri->gambar) }}" width="150" alt="{{ $galeri->judul }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Tambahkan deskripsi...">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
@endsection
