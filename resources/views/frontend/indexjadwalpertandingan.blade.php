@extends('')
@section('title','Halaman Jadwal Pertandingan')
@section('navMhs', 'active')

@section('content')
<div class="text-center mb-4">
    <h2>JADWAL PERTANDINGAN</h2>
</div>


    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
               
            </tr>
        </thead>
        <tbody>
            @forelse ($jadwalpertandingans as $jadwal)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $jadwal->tanggal }}</td>
                    <td>{{ $jadwal->waktu }}</td>
                    <td>{{ $jadwal->lokasi }}</td>
                   
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada jadwal pertandingan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
