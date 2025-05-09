@extends('backend.layouts.main')
@section('title','Halaman Anggota')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>DAFTAR ANGGOTA</h2>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('backend.anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Tanggal Lahir</th>
            <th>Peran</th>
            <th>Riwayat Prestasi</th>
            <th>Kontak</th>
            <th>Aksi</th>
        </tr>
        @foreach ($anggotas as $anggota)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $anggota->nama }}</td>
                <td>
                    @if ($anggota->foto)
                        <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto" width="70">
                    @else
                        <span>Tidak ada foto</span>
                    @endif
                </td>
                <td>{{ $anggota->tgl_lahir }}</td>
                <td>{{ $anggota->peran }}</td>
                <td>{{ $anggota->riwayat_prestasi }}</td>
                <td>{{ $anggota->kontak }}</td>
                <td>
                    <a href="{{ route('backend.anggota.edit', $anggota->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('backend.anggota.destroy', $anggota->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
