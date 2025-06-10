@extends('backend.layouts.main')
@section('title', 'Halaman Jadwal Pertandingan')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Jadwal Pertandingan</h2>
        <hr>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('backend.jadwal_pertandingan.create') }}" class="btn btn-primary"
            style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;">
            Tambah Jadwal Pertandingan
        </a>

        <button onclick="exportTableToExcel()" class="btn btn-success" title="Ekspor Excel"
            style="font-size: 24px; padding: 6px; height: 38px; width: 38px; display: flex; align-items: center; justify-content: center;">
            <i class="fa-solid fa-file-excel"></i>
        </button>
    </div>

    <table id="example" class="table table-bordered table-striped mt-3 text-center tableExportArea">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pertandingan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
       <tbody>
    @foreach ($jadwalpertandingans as $jadwal)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jadwal->nama_pertandingan }}</td>
            <td>
                {{ $jadwal->tanggal ? \Carbon\Carbon::parse($jadwal->tanggal)->format('d/m/Y') : '-' }}
            </td>
            <td>
                {{ $jadwal->waktu ? \Carbon\Carbon::parse($jadwal->waktu)->format('H:i') : '-' }}
            </td>
            <td>{{ $jadwal->lokasi }}</td>
            <td>{{ Str::limit($jadwal->deskripsi, 50) }}</td>
            <td>
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('backend.jadwal_pertandingan.edit', $jadwal->id) }}"
                        class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('backend.jadwal_pertandingan.destroy', $jadwal->id) }}" method="POST"
                        onsubmit="return handleDeleteJadwal()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>

    </table>
    <script>
        function handleDeleteJadwal() {
            const userRole = @json(Auth::user()->role);
            if (userRole !== 'admin' && userRole !== 'penyelenggara') {
                alert('Hanya admin atau penyelenggara yang dapat menghapus');
                return false;
            }
            return confirm('Yakin mau hapus?');
        }
    </script>


    <style>
        /* Tambahkan style untuk responsive table */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: middle;
        }

        /* Memastikan deskripsi tidak terlalu panjang */
        td {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endsection
