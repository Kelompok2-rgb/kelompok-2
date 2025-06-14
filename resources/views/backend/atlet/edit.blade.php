@extends('backend.layouts.app')

@section('title', 'Edit Atlet')

@section('content')
    <div class="container mt-4">
        <div class="card shadow border-0">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Edit Data Atlet</h3>
                <hr>

                <form action="{{ route('backend.atlet.update', $atlet->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama:</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $atlet->nama) }}" required>
                        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Foto --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Foto:</label><br>
                        @if ($atlet->foto)
                            <img src="{{ asset('storage/' . $atlet->foto) }}" alt="Foto Atlet" class="img-thumbnail mb-2" style="max-width: 120px;">
                        @endif
                        <input type="file" name="foto" class="form-control">
                        @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Prestasi --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Prestasi:</label>
                        <textarea name="prestasi" class="form-control" rows="3">{{ old('prestasi', $atlet->prestasi) }}</textarea>
                        @error('prestasi') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Klub --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Klub (Opsional):</label>
                        <select name="club_id" class="form-select">
                            <option value="">-- Pilih Klub --</option>
                            @foreach ($clubs as $club)
                                <option value="{{ $club->id }}" {{ old('club_id', $atlet->club_id) == $club->id ? 'selected' : '' }}>
                                    {{ $club->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('club_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('backend.atlet.index') }}" class="btn btn-secondary">← Kembali</a>
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
