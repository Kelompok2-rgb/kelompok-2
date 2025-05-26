@extends('frontend.index')

@section('content')
<section id="juri">
            <div class="container py-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">DATA JURI PORLEMPIKA</h2>
                    <hr class="w-25 mx-auto border-primary">
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pengalaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($juris as $juri)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $juri->nama }}</td>
                                    <td>{{ $juri->pengalaman }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Belum ada data juri</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            </section>
@endsection