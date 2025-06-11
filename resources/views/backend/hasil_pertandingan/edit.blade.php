@extends('backend.layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Edit Hasil Pertandingan</h2>
        <form action="{{ route('backend.hasil_pertandingan.update', $hasil_pertandingan->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="nama_pertandingan" class="form-label">Nama Pertandingan</label>
                <input type="text" step="0.01" class="form-control" id="nama_pertandingan" name="nama_pertandingan"
                    value="{{ old('nama_pertandingan') }}" required>
                @error('skor')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Atlet</label>
                <input type="text" step="0.01" class="form-control" id="nama" name="nama"
                    value="{{ old('nama') }}" required>
                @error('skor')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Skor:</label>
                <input type="number" step="0.01" name="skor" class="form-control"
                    value="{{ old('skor', $hasil_pertandingan->skor) }}" required>
                @error('skor')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Rangking:</label>
                <input type="number" name="rangking" class="form-control"
                    value="{{ old('rangking', $hasil_pertandingan->rangking) }}" min="1" step="1"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                @error('rangking')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>




            <div class="mb-3">
                <label class="form-label">Catatan Juri:</label>
                <textarea name="catatan_juri" class="form-control">{{ old('catatan_juri', $hasil_pertandingan->catatan_juri) }}</textarea>
                @error('catatan_juri')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>
@endsection
