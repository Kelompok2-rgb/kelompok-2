@extends('frontend.index')

@section('content')
    <section id="pertandingan">
        <div class="container py-4">
            <div class="text-center mb-4">
                <h2 class="fw-bold">DAFTAR PERTANDINGAN PORLEMPIKA</h2>
                <hr class="w-25 mx-auto border-primary">
            </div>



            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Pertandingan</th>
                            <th>Nama Penyelenggara</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pertandingans as $pertandingan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pertandingan->lokasi }}</td>
                                <td>{{ $pertandingan->nama_pertandingan }}</td>
                                <td>{{ $pertandingan->nama_penyelenggara }}</td>
                                <td>{{ $pertandingan->tanggal }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data pertandingan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
