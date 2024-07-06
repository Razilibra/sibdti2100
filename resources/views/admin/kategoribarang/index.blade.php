@extends('kerangka.master')

@section('title', 'Daftar Kategori Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center">Daftar Kategori Barang</h4>
            <a href="{{ route('kategori-barang.create') }}" class="btn btn-primary">Create Kategori Barang</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kondisi</th>
                            <th>Foto</th>
                            <th>Jumlah</th>
                            <th>Supplier</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori_barang as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategori->barang }}</td>
                                <td>{{ $kategori->kondisi }}</td>
                                <td>{{ $kategori->foto }}</td>
                                <td>{{ $kategori->jumlah }}</td>
                                <td>{{ $kategori->supplier->nama_supplier }}</td>
                                <td>
                                    <a href="{{ route('kategori-barang.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('kategori-barang.show', $kategori->id) }}" class="btn btn-info">Detail</a>
                                    <form action="{{ route('kategori-barang.destroy', $kategori->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori barang ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
