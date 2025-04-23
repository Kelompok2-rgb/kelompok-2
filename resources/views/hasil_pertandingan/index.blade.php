@extends('layouts.main')

@section('content')
<div class="text-center mb-4">
    <h2>DATA HASIL PERTANDINGAN</h2>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-3">
    <a href="{{ route('hasil_pertandingan.create') }}" class="btn btn-primary">Tambah Hasil Pertandingan</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Skor</th>
            <th>Rangking</th>
            <th>Catatan Juri</th>
            <th>Dibuat</th>
            <th>Diperbarui</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($hasil_pertandingans as $index => $hasil)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ $hasil->skor }}</td>
                <td class="text-center">{{ $hasil->rangking }}</td>
                <td>{{ $hasil->catatan_juri }}</td>
                <td class="text-center">{{ $hasil->created_at->format('d-m-Y H:i') }}</td>
                <td class="text-center">{{ $hasil->updated_at->format('d-m-Y H:i') }}</td>
                <td class="text-center">
                    <a href="{{ route('hasil_pertandingan.edit', $hasil->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('hasil_pertandingan.destroy', $hasil->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data hasil pertandingan</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
