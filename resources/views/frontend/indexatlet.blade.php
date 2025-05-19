<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Atlet Porlempika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container py-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold">DAFTAR ATLET PORLEMPIKA</h2>
            <hr class="w-25 mx-auto border-primary">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Nama Atlet</th>
                        <th width="15%">Foto</th>
                        <th>Prestasi</th>
                        <th>Statistik Pertandingan</th>
                        <th>Rekam Latihan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($atlets as $atlet)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $atlet->nama }}</td>
                        <td class="text-center">
                            @if($atlet->foto)
                                <img src="{{ asset('storage/'.$atlet->foto) }}" 
                                     alt="{{ $atlet->nama }}" 
                                     class="img-thumbnail"
                                     style="max-height: 80px">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>{{ $atlet->prestasi ?? '-' }}</td>
                        <td>{{ $atlet->statistik_pertandingan ?? '-' }}</td>
                        <td>{{ $atlet->training_record ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="bi bi-exclamation-circle me-2"></i> Data atlet belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>