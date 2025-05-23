@extends('backend.layouts.app')
@section('title', 'Tambah Hasil Pertandingan')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Hasil Pertandingan</h2> 
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('backend.hasil_pertandingan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="skor" class="form-label">Skor</label>
                <input type="number" step="0.01" class="form-control" id="skor" name="skor" value="{{ old('skor') }}" required>
                @error('skor') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="rangking" class="form-label">Rangking</label>
                <input type="number" class="form-control" id="rangking" name="rangking" value="{{ old('rangking') }}">
                @error('rangking') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="catatan_juri" class="form-label">Catatan Juri</label>
                <textarea class="form-control" id="catatan_juri" name="catatan_juri">{{ old('catatan_juri') }}</textarea>
                @error('catatan_juri') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
