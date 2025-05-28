@extends('frontend.index')

@section('content')
<section id="anggota">
    <div class="container py-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold">DAFTAR ANGGOTA PORLEMPIKA</h2>
            <hr class="w-25 mx-auto border-primary">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                   <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Tanggal Lahir</th>
            <th>Peran</th>
            <th>Riwayat Prestasi</th>
            <th>Nomor WA</th>
           
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
                          class="img-thumbnail anggota-img" style="max-width: 100px;">
                    @else
                        <span>Tidak ada foto</span>
                    @endif
                </td>
                <td>{{ $anggota->tgl_lahir }}</td>
                <td>{{ $anggota->peran }}</td>
                <td>{{ $anggota->riwayat_prestasi }}</td>
                <td>{{ $anggota->kontak }}</td>
            </tr>
             @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data anggota</td>
                </tr>
        @endforelse
        </tbody>
            </table>
        </div>
    </div>
    </section>
@endsection