@extends('backend.layouts.main')
@section('title', 'Halaman Jadwal Pertandingan')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Jadwal Pertandingan</h2>
        <hr>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex align-items-center gap-2 mb-3">
        <a href="{{ route('backend.jadwal_pertandingan.create') }}" class="btn btn-primary">
            <i class="fa fa-plus me-1"></i> Tambah Jadwal Pertandingan
        </a>
    </div>

    <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped text-center tableExportArea">
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
                        <td>{{ $jadwal->pertandingan->nama_pertandingan ?? '-' }}</td>
                        <td>{{ optional($jadwal->tanggal)->format('d/m/Y') }}</td>
                        <td>{{ optional(\Carbon\Carbon::parse($jadwal->waktu))->format('H:i') }}</td>
                        <td>{{ $jadwal->lokasi }}</td>
                        <td>{{ Str::limit($jadwal->deskripsi, 50) }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('backend.jadwal_pertandingan.edit', $jadwal->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('backend.jadwal_pertandingan.destroy', $jadwal->id) }}"
                                      method="POST"
                                      id="form-delete-{{ $jadwal->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $jadwal->id }})">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- SCRIPT LANGSUNG TANPA @push --}}
    <script>
        function confirmDelete(id) {
            const userRole = @json(Auth::user()->role);

            if (userRole !== 'admin' && userRole !== 'penyelenggara') {
                alert('Hanya admin atau penyelenggara yang dapat menghapus.');
                return;
            }

            if (confirm('Yakin ingin menghapus jadwal ini?')) {
                document.getElementById('form-delete-' + id).submit();
            }
        }
    </script>

    <style>
        td {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endsection
