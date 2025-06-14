@extends('backend.layouts.app')

@section('title', 'Edit Juri')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="card shadow border-0">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Edit Data Juri</h3>
                <hr>

                <form action="{{ route('backend.juri.update', $juri->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama', $juri->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Sertifikat --}}
                    <div class="mb-3">
                        <label for="sertifikat" class="form-label fw-bold">Sertifikat (PDF)</label><br>
                        @if ($juri->sertifikat && file_exists(public_path('storage/' . $juri->sertifikat)))
                            <a href="{{ asset('storage/' . $juri->sertifikat) }}" target="_blank" class="d-block mb-2 text-success">
                                📄 Lihat Sertifikat Lama
                            </a>
                        @else
                            <span class="text-muted d-block mb-2">Belum ada sertifikat</span>
                        @endif
                        <input type="file" name="sertifikat" id="sertifikat"
                            class="form-control @error('sertifikat') is-invalid @enderror"
                            accept=".pdf">
                        @error('sertifikat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            value="{{ old('tanggal_lahir', $juri->tanggal_lahir) }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('backend.juri.index') }}" class="btn btn-secondary">← Kembali</a>
                        <div>
                            <button type="reset" class="btn btn-warning me-2">Reset</button>
                            <button type="submit" class="btn btn-success">💾 Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
