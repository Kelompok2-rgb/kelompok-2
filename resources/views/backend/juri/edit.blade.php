@extends('backend.layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Edit Juri</h2>

    <form action="{{ route('backend.juri.update', $juri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $juri->nama) }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Sertifikat --}}
        <div class="mb-3">
            <label for="sertifikat" class="form-label">Sertifikat (PDF)</label><br>
            @if ($juri->sertifikat && file_exists(public_path('storage/' . $juri->sertifikat)))
                <a href="{{ asset('storage/' . $juri->sertifikat) }}" target="_blank">Lihat Sertifikat Lama</a><br>
            @else
                <span class="text-muted">Belum ada sertifikat</span><br>
            @endif
            <input type="file" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat" accept=".pdf">
            @error('sertifikat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal Lahir --}}
        <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                    name="tanggal_lahir" value="{{ old('tanggal_lahir', $juri->tanggal_lahir) }}">
                @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
       

        
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        
    </form>
</div>
@endsection
