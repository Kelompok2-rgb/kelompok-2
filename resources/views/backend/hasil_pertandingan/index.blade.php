@extends('backend.layouts.main')
@section('title', 'Halaman Hasil Pertandingan')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Hasil Pertandingan</h2>
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

    <table id="tableExportArea" class="table table-bordered table-striped mt-3 text-center">
        <thead class="table-dark">
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
            @forelse ($hasilPertandingans as $index => $hasil)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $hasil->skor }}</td>
                    <td class="text-center">{{ $hasil->rangking }}</td>
                    <td>{{ $hasil->catatan_juri }}</td>
                    <td class="text-center">{{ $hasil->created_at->format('d-m-Y H:i') }}</td>
                    <td class="text-center">{{ $hasil->updated_at->format('d-m-Y H:i') }}</td>
                    <td class="text-center">
                        <a href="{{ route('backend.hasil_pertandingan.edit', $hasil->id) }}"
                            class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('backend.hasil_pertandingan.destroy', $hasil->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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
                sheet: "Hasil Pertandingan"
            });
            XLSX.writeFile(workbook, 'hasil_pertandingan.xlsx');
        }
    </script>
@endsection
