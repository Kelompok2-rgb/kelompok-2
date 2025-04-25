@extends('layouts.main')
@section('title','Halaman Pertandingan')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Daftar Pertandingan</h2>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pertandingan.create') }}" class="btn btn-primary">Tambah Pertandingan</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($pertandingans as $pertandingan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pertandingan->lokasi }}</td>
                <td>{{ $pertandingan->tanggal }}</td>
                <td>
                    <a href="{{ route('anggota.edit', $pertandingan->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('anggota.destroy', $pertandingan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
