@extends('kerangka.master')

@section('title', 'Daftar Stok Barang')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header shadow-lg">
                    <h4 class="card-title text-center">Daftar Stok Barang</h4>

                    <a href="{{ route('barang.downloadPDF') }}" class="btn btn-danger mt-2 mb-2"><i class="bi bi-download"></i> PDF</a>
                    <a href="{{ route('barang.create') }}" class="btn btn-primary float-right">Tambah Barang</a>
                    <a href="{{ route('barang.export') }}" class="btn btn-primary">Export Barang</a>
                    <a href="{{ route('barang.formimport') }}" class="btn btn-primary">Import Barang</a>

                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3">
                            <form action="{{ route('barang.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Cari barang...">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-3">
                            <label for="showEntries">Tampilkan:</label>
                            <select name="showEntries" id="showEntries" class="form-control" onchange="window.location.href='{{ route('barang.index') }}?showEntries=' + this.value;">
                                <option value="10" {{ request('showEntries') == 10 ? 'selected' : '' }}>10 entri</option>
                                <option value="25" {{ request('showEntries') == 25 ? 'selected' : '' }}>25 entri</option>
                                <option value="50" {{ request('showEntries') == 50 ? 'selected' : '' }}>50 entri</option>
                                <option value="100" {{ request('showEntries') == 100 ? 'selected' : '' }}>100 entri</option>
                            </select>
                        </div>
                        @if ($barang->isEmpty())
                            <p>Tidak ada data stok barang.</p>
                        @else
                            <div class="table-responsive shadow-lg">
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
                                            <th>Aksi</th>
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
                                                <td>
                                                    <a href="{{ route('barang.show', $Barangs->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                    <a href="{{ route('barang.edit', $Barangs->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('barang.destroy', $Barangs->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $barang->appends(request()->input())->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
