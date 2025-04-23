@extends('layouts.main')

@section('content')
<div class="text-center mb-4">
    <h2>DATA ATLET PORLEMPIKA</h2>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-3">
    <a href="{{ route('atlet.create') }}" class="btn btn-primary">Tambah Atlet</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Prestasi</th>
            <th>Statistik Pertandingan</th>
            <th>Training Record</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($atlets as $index => $atlet)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $atlet->nama }}</td>
                <td class="text-center">
                    @if ($atlet->foto)
                        <img src="{{ asset('storage/' . $atlet->foto) }}" alt="Foto Atlet" width="60">
                    @else
                        Tidak ada foto
                    @endif
                </td>
                <td>{{ $atlet->prestasi }}</td>
                <td>{{ $atlet->statistik_pertandingan }}</td>
                <td>{{ $atlet->training_record }}</td>
                <td class="text-center">
                    <a href="{{ route('atlet.edit', $atlet->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('atlet.destroy', $atlet->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data atlet</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection