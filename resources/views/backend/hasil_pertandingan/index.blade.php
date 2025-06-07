@extends('backend.layouts.main')
@section('title', 'Halaman Hasil Pertandingan')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Hasil Pertandingan</h2>
        <hr>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('backend.hasil_pertandingan.create') }}" class="btn btn-primary"
            style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;">
            Tambah Hasil Pertandingan
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
                <th>Skor</th>
                <th>Rangking</th>
                <th>Catatan Juri</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach  ($hasilPertandingans as $index => $hasil)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $hasil->skor ?? '-' }}</td>
                    <td>{{ $hasil->rangking ?? '-' }}</td>
                    <td>{{ $hasil->catatan_juri ?? '-' }}</td>
                    <td>
                        <a href="{{ route('backend.hasil_pertandingan.edit', $hasil->id) }}"
                            class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('backend.hasil_pertandingan.destroy', $hasil->id) }}" method="POST"
                            class="d-inline" onsubmit="return handleDeleteHasil()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
           
           @endforeach
        </tbody>
    </table>

    <script>
        function handleDeleteHasil() {
            const userRole = @json(Auth::user()->role);
            if (userRole !== 'admin' && userRole !== 'juri') {
                alert('Hanya admin atau juri yang dapat menghapus');
                return false;
            }
            return confirm('Yakin ingin menghapus?');
        }
    </script>
@endsection
