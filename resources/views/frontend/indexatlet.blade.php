@extends('')
@section('title','Halaman Atlet')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>DAFTAR ATLET</h2>
    </div>


    <table class="table table-bordered mt-3">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Prestasi</th>
                <th>Statistik Pertandingan</th>
                <th>Training Record</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($atlets as $index => $atlet)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $atlet->nama }}</td>
                    <td class="text-center">
                        @if ($atlet->foto)
                            <img src="{{ asset('storage/' . $atlet->foto) }}" alt="Foto Atlet" width="60" class="img-thumbnail">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td>{{ $atlet->prestasi }}</td>
                    <td>{{ $atlet->statistik_pertandingan }}</td>
                    <td>{{ $atlet->training_record }}</td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data atlet</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
