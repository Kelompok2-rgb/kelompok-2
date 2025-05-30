@extends('frontend.index')

@section('content')
<section id="club">
            <div class="container py-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">DAFTAR KLUB PORLEMPIKA</h2>
                    <hr class="w-25 mx-auto border-primary">
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th>Nama Klub</th>
                                <th>Lokasi</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clubs as $club)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $club->nama }}</td>
                                <td>{{ $club->lokasi }}</td>
                                <td>{{ $club->deskripsi }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="bi bi-exclamation-circle me-2"></i> Data klub belum tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            </section>
@endsection

   