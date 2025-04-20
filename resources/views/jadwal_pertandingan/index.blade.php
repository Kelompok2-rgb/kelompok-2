@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <h2>Jadwal Pertandingan PORLEMPIKA</h2>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-3">
    <a href="{{ route('jadwal_pertandingan.create') }}" class="btn btn-primary">Tambah Jadwal Pertandingan</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jadwalpertandingans as $index => $jadwal)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $jadwal->tanggal }}</td>
                <td>{{ $jadwal->waktu }}</td>
                <td>{{ $jadwal->lokasi }}</td>
                <td class="text-center">
                    <a href="{{ route('jadwal_pertandingan.edit', $jadwal->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('jadwal_pertandingan.destroy', $jadwal->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada jadwal pertandingan</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
