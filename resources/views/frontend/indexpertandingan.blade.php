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
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pertandingans as $pertandingan)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $pertandingan->lokasi }}</td>
                                <td>{{ $pertandingan->tanggal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
