@extends('backend.layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="container mt-4 mb-5">
    <div class="card shadow border-0">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Edit Galeri</h3>
            <hr>

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('backend.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label fw-bold">Judul</label>
                    <input type="text" name="judul" id="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $galeri->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Upload Gambar --}}
                <div class="mb-3">
                    <label for="gambar" class="form-label fw-bold">Gambar Baru (Opsional)</label>
                    <input type="file" name="gambar" id="gambar"
                        class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                </div>

                {{-- Gambar Lama --}}
                @if ($galeri->gambar)
                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Saat Ini:</label><br>
                        <img src="{{ asset('uploads/' . $galeri->gambar) }}" width="200" class="img-thumbnail" alt="{{ $galeri->judul }}">
                    </div>
                @endif

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi"
                        class="form-control @error('deskripsi') is-invalid @enderror" rows="4"
                        placeholder="Tambahkan deskripsi...">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('backend.galeri.index') }}" class="btn btn-secondary">← Kembali</a>
                    <div>
                        <button type="reset" class="btn btn-warning me-2">Reset</button>
                        <button type="submit" class="btn btn-success">💾 Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
