@extends('layouts.main')
@section('title','Halaman Club')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>DAFTAR CLUB</h2>
    </div>
    
    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('club.create') }}" class="btn btn-primary">Tambah Club</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Nama Club</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        @foreach ($clubs as $club)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $club->nama }}</td>
                <td>{{ $club->lokasi }}</td>
                <td>{{ $club->deskripsi }}</td>
                <td>
                    <a href="{{ route('club.edit', $club->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('club.destroy', $club->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
