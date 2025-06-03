@extends('backend.layouts.app')
@section('title', 'Tambah Juri')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Juri</h2> 
    </div>
    <div class="card-body">

        {{-- Tampilkan pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form tambah juri --}}
        <form action="{{ route('backend.juri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama') 
                    <div class="invalid-feedback">{{ $message }}</div> 
                @enderror
            </div>

            {{-- Tanggal Lahir --}}
            <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            {{-- Upload Sertifikat --}}
            <div class="mb-3">
                <label for="sertifikat" class="form-label">Sertifikat (PDF)</label>
                <input type="file" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat" accept=".pdf" required>
                @error('sertifikat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>
</div>
@endsection
