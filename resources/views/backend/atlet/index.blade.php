@extends('backend.layouts.main')
@section('title', 'Halaman Atlet')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Atlet</h2>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('backend.atlet.create') }}" class="btn btn-primary"
            style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;">
            Tambah Atlet
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
                <th>Nama</th>
                <th>Foto</th>
                <th>Prestasi</th>
                <th>Rekap Latihan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($atlets as $index => $atlet)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $atlet->nama }}</td>
                    <td class="text-center">
                        @if ($atlet->foto)
                            <img src="{{ asset('storage/' . $atlet->foto) }}" alt="Foto Atlet" width="60"
                                class="img-thumbnail">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td>{{ $atlet->prestasi }}</td>
                    <td>{{ $atlet->rekap_latihan }}</td>
                    <td class="text-center">
                        <a href="{{ route('backend.atlet.edit', $atlet->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('backend.atlet.destroy', $atlet->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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
                sheet: "Atlet"
            });
            XLSX.writeFile(workbook, 'atlet.xlsx');
        }
    </script>
@endsection
