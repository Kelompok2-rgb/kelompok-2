@extends('frontend.index')

@section('content')
<section id="anggota">
    <div class="container py-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold">DAFTAR ANGGOTA PORLEMPIKA</h2>
            <hr class="w-25 mx-auto border-primary">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th width="15%">Foto</th>
                        <th>Tanggal Lahir</th>
                        <th>Peran</th>
                        <th>Riwayat Prestasi</th>
                        <th>Kontak</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anggotas as $anggota)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $anggota->nama }}</td>
                        <td class="text-center">
                            @if($anggota->foto)
                                <img src="{{ asset('storage/'.$anggota->foto) }}" 
                                     alt="{{ $anggota->nama }}" 
                                     class="img-thumbnail"
                                     style="max-height: 80px">
                            @else
                                <span class="badge bg-secondary">Tidak ada foto</span>
                            @endif
                        </td>
                        <td>{{ $anggota->tgl_lahir }}</td>
                        <td>{{ $anggota->peran }}</td>
                        <td>{{ $anggota->riwayat_prestasi }}</td>
                        <td>{{ $anggota->kontak }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="bi bi-exclamation-circle me-2"></i> Data anggota belum tersedia
                        </td>
                    </tr>
                     @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data anggota</td>
                </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </section>
@endsection