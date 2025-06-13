@extends('backend.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Atlet</h2>
    <form action="{{ route('backend.atlet.update', $atlet->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $atlet->nama) }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Foto:</label><br>
            @if ($atlet->foto)
                <img src="{{ asset('storage/' . $atlet->foto) }}" alt="Foto Atlet" style="max-width: 100px;"><br>
            @endif
            <input type="file" name="foto" class="form-control mt-2">
            @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Prestasi:</label>
            <textarea name="prestasi" class="form-control">{{ old('prestasi', $atlet->prestasi) }}</textarea>
            @error('prestasi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Klub (Opsional):</label>
            <select name="club_id" class="form-control">
                <option value="">-- Pilih Klub --</option>
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}" {{ old('club_id', $atlet->club_id) == $club->id ? 'selected' : '' }}>
                        {{ $club->nama }}
                    </option>
                @endforeach
            </select>
            @error('club_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </form>
</div>
@endsection
