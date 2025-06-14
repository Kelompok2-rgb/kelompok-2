@extends('backend.layouts.app')

@section('title', 'Edit Pengumuman')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="card shadow border-0">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Edit Pengumuman</h3>
                <hr>

                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Periksa kembali input Anda:</strong>
                        <ul class="mb-0 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('backend.pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-bold">Judul</label>
                        <input type="text" name="judul" id="judul"
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $pengumuman->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Isi --}}
                    <div class="mb-3">
                        <label for="isi" class="form-label fw-bold">Isi Pengumuman</label>
                        <textarea name="isi" id="isi" rows="5"
                            class="form-control @error('isi') is-invalid @enderror" required>{{ old('isi', $pengumuman->isi) }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tanggal --}}
                    <div class="mb-3">
                        <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', $pengumuman->tanggal) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Foto Baru --}}
                    <div class="mb-3">
                        <label for="foto" class="form-label fw-bold">Ganti Foto (Opsional)</label>
                        <input type="file" name="foto" id="foto"
                            class="form-control @error('foto') is-invalid @enderror"
                            accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti. Maksimal ukuran 2MB.</small>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Foto Lama --}}
                    @if ($pengumuman->foto)
                        <div class="mb-4">
                            <label class="form-label fw-bold">Foto Saat Ini:</label><br>
                            <img src="{{ asset('storage/pengumuman/' . $pengumuman->foto) }}" alt="Foto Pengumuman"
                                class="img-fluid rounded" style="max-width: 300px;">
                        </div>
                    @endif

                    {{-- Tombol Aksi --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('backend.pengumuman.index') }}" class="btn btn-secondary">← Kembali</a>
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
