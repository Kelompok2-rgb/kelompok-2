@extends('frontend.index')

@section('content')
<section id="kategori_pertandingan">
            <div class="container py-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">KATEGORI PERTANDINGAN PORLEMPIKA</h2>
                    <hr class="w-25 mx-auto border-primary">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aturan</th>
                                <th>Batasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategoripertandingans as $index => $kategori)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $kategori->nama }}</td>
                                    <td>{{ $kategori->aturan }}</td>
                                    <td>{{ $kategori->batasan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada kategori pertandingan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            </section>
@endsection