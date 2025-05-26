@extends('frontend.index')

@section('content')
<section id="jadwal_pertandingan">
            <div class="container py-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">JADWAL PERTANDINGAN PORLEMPIKA</h2>
                    <hr class="w-25 mx-auto border-primary">

                <div class="table-responsive">
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
                                    <td colspan="4" class="text-center">Belum ada jadwal pertandingan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            </section>

@endsection