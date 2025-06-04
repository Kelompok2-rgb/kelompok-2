@extends('backend.layouts.app')


@section('title', 'Edit Pengumuman')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Pengumuman</h2>

        <form action="{{ route('backend.pengumuman.update', $pengumuman->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $pengumuman->judul }}" required>
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <textarea name="isi" class="form-control" rows="5" required>{{ $pengumuman->isi }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $pengumuman->tanggal }}" required>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>
@endsection
