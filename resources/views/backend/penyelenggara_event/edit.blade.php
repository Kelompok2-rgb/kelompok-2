@extends('backend.layouts.app')


@section('content')
<div class="container">
    <h2>Edit Penyelenggara Event</h2>

    {{-- Tampilkan pesan sukses jika ada --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Edit --}}
    <form action="{{ route('backend.penyelenggara_event.update', $penyelenggara_event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_penyelenggara_event">Nama Penyelenggara</label>
            <input type="text" name="nama_penyelenggara_event" class="form-control" value="{{ old('nama_penyelenggara_event', $penyelenggara_event->nama_penyelenggara_event) }}" required>
        </div>

        <div class="form-group">
            <label for="nama_event">Nama Event</label>
            <input type="text" name="nama_event" class="form-control" value="{{ old('nama_event', $penyelenggara_event->nama_event) }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $penyelenggara_event->tanggal) }}" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $penyelenggara_event->lokasi) }}" required>
        </div>

         <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </form>
</div>
@endsection
