<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; font-size: 12px; }
    </style>
</head>
<body>

<h2>Laporan Data Buku</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $i => $b)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->penulis }}</td>
            <td>{{ $b->tahun_terbit }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
