@extends('kerangka.master')

@section('title', 'Daftar Barang Masuk')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title text-center">Daftar Barang Masuk</h4>
                        <button class="btn btn-danger mt-2 mb-2" onclick="window.print()"><i class="bi bi-download"></i> PDF</button>
                        <a href="{{ route('barang-masuk.create') }}" class="btn btn-primary float-right">Create Barang Masuk</a>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            @if ($barangMasuk->isEmpty())
                                <p>Tidak ada data barang masuk.</p>
                            @else
                                <div class="table-responsive shadow-lg">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Jumlah Barang</th>
                                                <th>Supplier</th>
                                                <th>Barang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barangMasuk as $bm)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bm->tanggal_masuk }}</td>
                                                    <td>{{ $bm->jumlah_barang }}</td>
                                                    <td>{{ $bm->supplier->nama_supplier }}</td>
                                                    <td>{{ $bm->barang->nama_barang }}</td>
                                                    <td>
                                                        <a href="{{ route('barang-masuk.show', $bm->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                        <a href="{{ route('barang-masuk.edit', $bm->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('barang-masuk.destroy', $bm->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang masuk ini?')">Hapus</button>
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
            $('.table').DataTable({
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
