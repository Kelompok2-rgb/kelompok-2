
@extends('layouts.main')

@section('content')
<div class="text-center mb-4">
    <h2>Data Juri PORLEMPIKA</h2>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-3">
    <a href="{{ route('juri.create') }}" class="btn btn-primary">Tambah Juri</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pengalaman</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($juris as $index => $juri)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $juri->nama }}</td>
                <td>{{ $juri->pengalaman }}</td>
                <td class="text-center">
                    <a href="{{ route('juri.edit', $juri->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('juri.destroy', $juri->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data juri</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

