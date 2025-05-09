@extends('layouts.appkategori_pertandingan')


@section('content')
<div class="container mt-4">
    <h2>Edit Kategori Pertandingan</h2>
    <form action="{{ route('kategoripertandingans.update', $kategoripertandingan->id) }}" method="POST">
        @csrf
        @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Kategori:</label>
                <input type="text" name="nama" class="form-control" value="{{ $kategoripertandingan->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Aturan:</label>
                <input type="text" name="aturan" class="form-control" value="{{ $kategoripertandingan->aturan }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Batasan:</label>
                <input type="text" name="batasan" class="form-control" value="{{ $kategoripertandingan->batasan }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
