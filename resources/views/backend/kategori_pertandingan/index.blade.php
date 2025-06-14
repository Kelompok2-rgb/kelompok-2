@extends('backend.layouts.main')

@section('title', 'Kategori Pertandingan')

@section('content')
    <div class="text-center mb-4">
        <h2>Kategori Pertandingan</h2>
        <hr>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
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

    <table id="example" class="table table-bordered table-striped mt-3 text-center tableExportArea">
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
            @foreach ($kategoripertandingans as $index => $kategori)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $kategori->nama }}</td>
                    <td>{{ $kategori->aturan }}</td>
                    <td>{{ $kategori->batasan }}</td>
                    <td class="text-center">
                        <a href="{{ route('backend.kategori_pertandingan.edit', $kategori->id) }}"
                            class="btn btn-warning btn-sm me-1"><i class="fas fa-edit"></i>Edit</a>

                        <form action="{{ route('backend.kategori_pertandingan.destroy', $kategori->id) }}" method="POST"
                            class="d-inline" onsubmit="return handleDeleteKategoriPertandingan()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</button>
                        </form>



                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function handleDeleteKategoriPertandingan() {
            const userRole = @json(Auth::user()->role);
            if (userRole !== 'admin' && userRole !== 'penyelenggara') {
                alert('Hanya admin atau penyelenggara yang dapat menghapus.');
                return false;
            }
            return confirm('Yakin mau hapus?');
        }
    </script>

@endsection
