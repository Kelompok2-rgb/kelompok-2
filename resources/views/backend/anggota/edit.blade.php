@extends('backend.layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <div class="container mt-4 mb-5">
        <h2 class="mb-4">Edit Anggota</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('backend.anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama', $anggota->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label><br>
                @if ($anggota->foto && file_exists(public_path('storage/' . $anggota->foto)))
                    <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto Anggota" width="100" class="mb-2"><br>
                @else
                    <span class="text-muted">Tidak ada foto</span><br>
                @endif
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir"
                    value="{{ old('tgl_lahir', $anggota->tgl_lahir) }}">
                @error('tgl_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="peran" class="form-label">Peran</label>
                <input type="text" class="form-control @error('peran') is-invalid @enderror" id="peran" name="peran"
                    value="{{ old('peran', $anggota->peran) }}">
                @error('peran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="riwayat_prestasi" class="form-label">Riwayat Prestasi</label>
                <textarea class="form-control @error('riwayat_prestasi') is-invalid @enderror" id="riwayat_prestasi" name="riwayat_prestasi" rows="4">{{ old('riwayat_prestasi', $anggota->riwayat_prestasi) }}</textarea>
                @error('riwayat_prestasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak"
                    value="{{ old('kontak', $anggota->kontak) }}">
                @error('kontak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
@endsection
