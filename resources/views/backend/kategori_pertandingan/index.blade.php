@extends('backend.layouts.main')

@section('title', 'Kategori Pertandingan')

@section('content')
  <div class="text-center mb-4">
      <h2>Kategori Pertandingan</h2>
  </div>

  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('backend.kategori_pertandingan.create') }}" class="btn btn-primary"
            style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;">
            Tambah Kategori Pertandingan
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
              <th>Nama Kategori</th>
              <th>Aturan</th>
              <th>Batasan</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($kategoripertandingans as $index => $kategori)
              <tr>
                  <td class="text-center">{{ $index + 1 }}</td>
                  <td>{{ $kategori->nama }}</td>
                  <td>{{ $kategori->aturan }}</td>
                  <td>{{ $kategori->batasan }}</td>
                  <td class="text-center">
                      <a href="{{ route('backend.kategori_pertandingan.edit', $kategori->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>

                      <form action="{{ route('backend.kategori_pertandingan.destroy', $kategori->id) }}"
                            method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                                  class="btn btn-danger btn-sm"
                                  onclick="return confirm('Yakin mau hapus?')">
                              Hapus
                          </button>
                      </form>
                  </td>
              </tr>
          @empty
              <tr>
                  <td colspan="5" class="text-center">Belum ada kategori pertandingan</td>
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
                sheet: "Kategori Pertandingan"
            });
            XLSX.writeFile(workbook, 'Kategori_pertandingan.xlsx');
        }
    </script>
@endsection
