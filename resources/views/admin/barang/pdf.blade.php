<!DOCTYPE html>
<html>
<head>
    <title>Data Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
  <h1>Data Barang</h1>
  <table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>posisi</th>
            <th>Stok</th>
            <th>Foto</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $Barangs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $Barangs->nama_barang }}</td>
                <td>{{ $Barangs->kode_barang }}</td>
                <td>{{ $Barangs->posisi }}</td>
                <td>{{ $Barangs->stok }}</td>
                <td>
                    @if ($Barangs->foto)
                        <img src="{{ asset('images/' . $Barangs->foto) }}" alt="Foto Barang" style="max-width: 100px;">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $Barangs->status }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
