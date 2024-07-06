@extends('kerangka.master')

@section('title', 'Daftar Barang Keluar')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title text-center">Daftar Barang Keluar</h4>
                        <button class="btn btn-danger mt-2 mb-2" onclick="window.print()"><i class="bi bi-download"></i>
                            PDF</button>
                        <a href="{{ route('barang_keluar.create') }}" class="btn btn-primary float-right">Tambah Barang Keluar</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-3">
                                <form action="{{ route('barang_keluar.search') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="keyword" class="form-control" placeholder="Cari barang keluar...">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-3">
                                <label for="showEntries">Tampilkan:</label>
                                <select name="showEntries" id="showEntries" class="form-control">
                                    <option value="1">1 entri</option>
                                    <option value="5">5 entri</option>
                                    <option value="10">10 entri</option>
                                    <option value="20">20 entri</option>
                                </select>
                            </div>
                            @if ($barangKeluars->isEmpty())
                                <p>Tidak ada data barang keluar.</p>
                            @else
                                <div class="table-responsive shadow-lg">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>ID Peminjaman</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barangKeluars as $barangKeluar)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $barangKeluar->id_peminjaman }}</td>
                                                    <td>{{ $barangKeluar->tanggal_keluar }}</td>
                                                    <td>
                                                        <a href="{{ route('barang_keluar.show', $barangKeluar->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                        <a href="{{ route('barang_keluar.edit', $barangKeluar->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('barang_keluar.destroy', $barangKeluar->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang keluar ini?')">Hapus</button>
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
@endsection
