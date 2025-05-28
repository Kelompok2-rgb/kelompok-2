@extends('backend.layouts.app')

@section('content')
  @section('content')
<div class="container mt-4">
    <h2>Edit Juri</h2>
    <form action="{{ route('backend.juri.update', $juri->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ $juri->nama }}" required>
        </div>

       
            <div class="mb-3">
                <label for="sertifikat" class="form-label">Sertifikat</label><br>
                @if ($anggota->sertifikat && file_exists(public_path('storage/' . $anggota->sertifikat)))
                    <img src="{{ asset('storage/' . $anggota->sertifikat) }}" alt="sertifikat " width="100" class="mb-2"><br>
                @else
                    <span class="text-muted">Tidak ada prestasi</span><br>
                @endif
                <input type="file" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat">
                @error('sertifikat')
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

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
