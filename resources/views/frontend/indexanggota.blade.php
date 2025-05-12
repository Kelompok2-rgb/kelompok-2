@extends('')
@section('title','Halaman Anggota')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>DAFTAR ANGGOTA</h2>
    </div>


    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Tanggal Lahir</th>
            <th>Peran</th>
            <th>Riwayat Prestasi</th>
            <th>Kontak</th>
        </tr>
        @foreach ($anggotas as $anggota)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $anggota->nama }}</td>
                <td>
                    @if ($anggota->foto)
                        <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto" width="70">
                    @else
                        <span>Tidak ada foto</span>
                    @endif
                </td>
                <td>{{ $anggota->tgl_lahir }}</td>
                <td>{{ $anggota->peran }}</td>
                <td>{{ $anggota->riwayat_prestasi }}</td>
                <td>{{ $anggota->kontak }}</td>
               
            </tr>
        @endforeach
    </table>
@endsection
