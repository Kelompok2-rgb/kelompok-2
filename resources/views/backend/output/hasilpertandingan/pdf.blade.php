<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Pertandingan - {{ $pertandingan->nama_pertandingan }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #000;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        h2,
        h3 {
            margin: 0;
            text-align: center;
        }

        .section-title {
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>HASIL PERTANDINGAN</h2>
    <h3>{{ $pertandingan->nama_pertandingan }}</h3>
    <br>

    <table>
        <tr>
            <th>Nama Pertandingan</th>
            <td>{{ $pertandingan->nama_pertandingan }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>
                {{ optional($pertandingan->jadwalPertandingan)->tanggal
                    ? \Carbon\Carbon::parse($pertandingan->jadwalPertandingan->tanggal)->format('d-m-Y')
                    : '-' }}
            </td>

        </tr>
        <tr>
            <th>Waktu</th>
            <td>{{ optional($pertandingan->jadwalPertandingan)->waktu
                ? \Carbon\Carbon::parse($pertandingan->jadwalPertandingan->waktu)->format('H:i')
                : '-' }}
            </td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ optional($pertandingan->jadwalPertandingan)->lokasi ?? '-' }}</td>
        </tr>
        <tr>
            <th>Penyelenggara</th>
            <td>{{ optional($pertandingan->penyelenggaraEvent)->nama_penyelenggara_event ?? '-' }}</td>
        </tr>
        <tr>
            <th>Juri</th>
            <td>{{ optional($pertandingan->juri)->nama_juri ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Detail Hasil Peforma Peserta</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Lemparan 1</th>
                <th>Lemparan 2</th>
                <th>Lemparan 3</th>
                <th>Lemparan 4</th>
                <th>Lemparan 5</th>
                <th>Skor</th>
                <th>Rangking</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pertandingan->hasilPertandingan as $key => $hasil)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ optional($hasil->atlet)->nama ?? '-' }}</td>
                    <td>{{ $hasil->lemparan_1 }}</td>
                    <td>{{ $hasil->lemparan_2 }}</td>
                    <td>{{ $hasil->lemparan_3 }}</td>
                    <td>{{ $hasil->lemparan_4 }}</td>
                    <td>{{ $hasil->lemparan_5 }}</td>
                    <td>{{ $hasil->skor }}</td>
                    <td>{{ $hasil->rangking }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Belum ada data hasil pertandingan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
