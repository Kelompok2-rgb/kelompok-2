@extends('backend.layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="card shadow border-0">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Edit Data Anggota</h3>
                <hr>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('backend.anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            value="{{ old('nama', $anggota->nama) }}" required>
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Foto --}}
                    <div class="mb-3">
                        <label for="foto" class="form-label fw-bold">Foto</label><br>
                        @if ($anggota->foto && file_exists(public_path('storage/' . $anggota->foto)))
                            <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto Anggota" class="img-thumbnail mb-2" style="max-width: 120px;">
                        @else
                            <p class="text-muted">Tidak ada foto</p>
                        @endif
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                        @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Klub --}}
                    <div class="mb-3">
                        <label for="klub" class="form-label fw-bold">Klub</label>
                        <input type="text" class="form-control @error('klub') is-invalid @enderror" id="klub"
                            name="klub" value="{{ old('klub', $anggota->klub) }}">
                        @error('klub') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                            name="tgl_lahir" value="{{ old('tgl_lahir', $anggota->tgl_lahir) }}">
                        @error('tgl_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Peran --}}
                    <div class="mb-3">
                        <label for="peran" class="form-label fw-bold">Peran</label>
                        <select class="form-select @error('peran') is-invalid @enderror" id="peran" name="peran">
                            <option value="">-- Pilih Peran --</option>
                            <option value="Atlet" {{ old('peran', $anggota->peran) == 'Atlet' ? 'selected' : '' }}>Atlet</option>
                            <option value="Pengurus" {{ old('peran', $anggota->peran) == 'Pengurus' ? 'selected' : '' }}>Pengurus</option>
                            <option value="Atlet & Pengurus" {{ old('peran', $anggota->peran) == 'Atlet & Pengurus' ? 'selected' : '' }}>Atlet & Pengurus</option>
                        </select>
                        @error('peran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Kontak --}}
                    <div class="mb-3">
                        <label for="kontak" class="form-label fw-bold">Nomor WA</label>
                        <input type="number" class="form-control @error('kontak') is-invalid @enderror" id="kontak"
                            name="kontak" value="{{ old('kontak', $anggota->kontak) }}">
                        @error('kontak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('backend.anggota.index') }}" class="btn btn-secondary">← Kembali</a>
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
