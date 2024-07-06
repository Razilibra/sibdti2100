@extends('kerangka.master')

@section('title', 'Daftar Peminjaman')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title text-center">Daftar Peminjaman</h4>
                        <button class="btn btn-danger mt-2 mb-2" onclick="window.print()"><i class="bi bi-download"></i>
                            PDF</button>
                        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary float-right">Create Peminjaman</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if ($peminjaman->isEmpty())
                                <p>Tidak ada data peminjaman.</p>
                            @else
                                <div class="table-responsive shadow-lg">
                                    <table id="peminjamanTable" class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Nama User</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($peminjaman as $pinjam)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pinjam->barang->nama_barang }}</td>
                                                    <td>{{ $pinjam->user->nama }}</td>
                                                    <td>{{ $pinjam->jumlah }}</td>
                                                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                                                    <td>
                                                        <a href="{{ route('peminjaman.show', $pinjam->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                        <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('peminjaman.destroy', $pinjam->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#peminjamanTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
