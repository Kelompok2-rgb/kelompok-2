@extends('layouts.apphasil_pertandingan')

@section('content')
<div class="container mt-4">
    <h2>Edit Hasil Pertandingan</h2>
    <form action="{{ route('hasil_pertandingan.update', $hasil_pertandingan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Skor:</label>
            <input type="number" step="0.01" name="skor" class="form-control" value="{{ $hasil_pertandingan->skor }}" required>
            @error('skor') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Rangking:</label>
            <input type="number" name="rangking" class="form-control" value="{{ $hasil_pertandingan->rangking }}">
            @error('rangking') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan Juri:</label>
            <textarea name="catatan_juri" class="form-control">{{ $hasil_pertandingan->catatan_juri }}</textarea>
            @error('catatan_juri') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
