@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Jadwal Pertandingan</h2>
    <form action="{{ route('jadwal_pertandingan.update', $jadwalpertandingan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tanggal:</label>
            <input type="text" name="tanggal" class="form-control" value="{{ $jadwalpertandingan->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu:</label>
            <input type="text" name="waktu" class="form-control" value="{{ $jadwalpertandingan->waktu }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi:</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $jadwalpertandingan->lokasi }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
