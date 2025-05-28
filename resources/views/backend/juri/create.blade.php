@extends('backend.layouts.app')
@section('title', 'Tambah Juri')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Juri</h2> 
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('backend.juri.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

             <div class="mb-3">
                    <label for="sertifikat" class="form-label">Sertifikat</label>
                    <input type="file" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat">
                    @error('prestasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir"
                        value="{{ old('tgl_lahir') }}">
                    @error('tgl_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
