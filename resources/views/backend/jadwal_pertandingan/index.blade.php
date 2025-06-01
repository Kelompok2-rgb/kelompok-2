@extends('backend.layouts.main')
@section('title', 'Halaman Jadwal Pertandingan')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Jadwal Pertandingan</h2>
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
    <table id="tableExportArea" class="table table-bordered table-striped mt-3 text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jadwalpertandingans as $jadwal)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $jadwal->tanggal }}</td>
                    <td>{{ $jadwal->waktu }}</td>
                    <td>{{ $jadwal->lokasi }}</td>
                    <td class="text-center">
                        <a href="{{ route('backend.jadwal_pertandingan.edit', $jadwal->id) }}"
                            class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('backend.jadwal_pertandingan.destroy', $jadwal->id) }}" method="POST"
                            class="d-inline" onsubmit="return handleDeleteJadwal()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>

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

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada jadwal pertandingan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- SheetJS untuk Export Excel -->
    <script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
    <script>
        function exportTableToExcel() {
            // Ambil tabel asli
            const originalTable = document.querySelector('#tableExportArea');

            // Clone tabel supaya tidak merubah tabel asli di halaman
            const cloneTable = originalTable.cloneNode(true);

            // Hapus kolom aksi (kolom terakhir) di setiap baris (header dan body)
            cloneTable.querySelectorAll('tr').forEach(row => {
                if (row.cells.length > 0) {
                    row.deleteCell(row.cells.length - 1); // hapus kolom terakhir
                }
            });

            // Buat workbook dari clone tabel yang sudah tanpa kolom aksi
            const workbook = XLSX.utils.table_to_book(cloneTable, {
                sheet: "Jadwal Pertandingan"
            });
            XLSX.writeFile(workbook, 'jadwal_pertandingan.xlsx');
        }
    </script>
@endsection
