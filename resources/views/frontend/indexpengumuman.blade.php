
@extends('frontend.index')

@section('content')
          <div class="container py-4">
            <section id="pengumuman">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">DAFTAR PENGUMUMAN PORLEMPIKA</h2>
                    <hr class="w-25 mx-auto border-primary">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Isi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumumans as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                    <td>{{ $item->isi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </section>
            @endsection
      