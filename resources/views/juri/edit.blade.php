@extends('layouts.main') {{-- Ganti dengan layout juri jika berbeda --}}

@section('content')
<div class="container mt-4">
    <h2>Edit Juri</h2>
    <form action="{{ route('juri.update', $juri->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ $juri->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pengalaman:</label>
            <textarea name="pengalaman" class="form-control" required>{{ $juri->pengalaman }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection