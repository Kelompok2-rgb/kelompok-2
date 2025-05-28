@extends('backend.layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Edit Atlet</h2>
    <form action="{{ route('backend.atlet.update', $atlet->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ $atlet->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto (opsional):</label><br>
            @if ($atlet->foto)
                <img src="{{ asset('storage/' . $atlet->foto) }}" alt="Foto Atlet" style="max-width: 100px;"><br>
            @endif
            <input type="file" name="foto" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label class="form-label">Prestasi:</label>
            <textarea name="prestasi" class="form-control">{{ $atlet->prestasi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Rekap Latihan:</label>
            <textarea name="rekap_latihan" class="form-control">{{ $atlet->rekap_latihan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
