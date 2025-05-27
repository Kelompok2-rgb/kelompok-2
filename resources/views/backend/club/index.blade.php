@extends('backend.layouts.main')
@section('title','Halaman Club')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Klub</h2>
    </div>
    
    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('backend.club.create') }}" class="btn btn-primary"
            style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;">
            Tambah Klub
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
            <th>Nama Klub</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($clubs as $club)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $club->nama }}</td>
                <td>{{ $club->lokasi }}</td>
                <td>{{ $club->deskripsi }}</td>
                <td>
                    <a href="{{ route('backend.club.edit', $club->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('backend.club.destroy', $club->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data klub belum tersedia</td>
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
    const workbook = XLSX.utils.table_to_book(cloneTable, { sheet: "Club" });
    XLSX.writeFile(workbook, 'club.xlsx');
}

    </script>
@endsection
