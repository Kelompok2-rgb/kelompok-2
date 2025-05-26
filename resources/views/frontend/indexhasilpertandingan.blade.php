@extends('frontend.index')

@section('content')
<section id="hasil_pertandingan">
            <div class="container py-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">DATA HASIL PERTANDINGAN PORLEMPIKA</h2>
                    <hr class="w-25 mx-auto border-primary">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th>Skor</th>
                                <th>Ranking</th>
                                <th>Catatan Juri</th>
                                <th>Dibuat</th>
                                <th>Diperbarui</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($hasilpertandingans as $index => $hasil)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $hasil->skor }}</td>
                                <td class="text-center">{{ $hasil->rangking }}</td>
                                <td>{{ $hasil->catatan_juri }}</td>
                                <td class="text-center">{{ $hasil->created_at->format('d-m-Y H:i') }}</td>
                                <td class="text-center">{{ $hasil->updated_at->format('d-m-Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-exclamation-circle me-2"></i> Belum ada data hasil pertandingan
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            </section>
@endsection
    