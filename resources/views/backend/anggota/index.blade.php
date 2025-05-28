@extends('backend.layouts.main')
@section('title', 'Halaman Anggota')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Anggota</h2>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('backend.anggota.create') }}" class="btn btn-primary"
            style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;">
            Tambah Anggota
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
            <th>Tanggal Lahir</th>
            <th>Peran</th>
            <th>Riwayat Prestasi</th>
            <th>Nomor WA</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($anggotas as $anggota)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $anggota->nama }}</td>
                <td>
                    @if ($anggota->foto)
                        <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto" width="70"
                        class="foto-hover" width="60" style="transition: transform 0.5s;">
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
                    <form action="{{ route('backend.anggota.destroy', $anggota->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
             @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data anggota</td>
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
    const workbook = XLSX.utils.table_to_book(cloneTable, { sheet: "Anggota" });
    XLSX.writeFile(workbook, 'anggota.xlsx');
}

    </script>



@endsection
