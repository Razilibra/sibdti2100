@extends('kerangka.master')

@section('title', 'Detail Barang Masuk')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Detail Barang Masuk</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk:</label>
                            <input type="text" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ $barangMasuk->tanggal_masuk }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah Barang:</label>
                            <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ $barangMasuk->jumlah_barang }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="supplier">Supplier:</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" value="{{ $barangMasuk->supplier->nama_supplier }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="barang">Barang:</label>
                            <input type="text" class="form-control" id="barang" name="barang" value="{{ $barangMasuk->barang->nama_barang }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Dibuat pada:</label>
                            <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $barangMasuk->created_at->format('d M Y H:i:s') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Diperbarui pada:</label>
                            <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $barangMasuk->updated_at->format('d M Y H:i:s') }}" readonly>
                        </div>
                        <a href="{{ route('barang-masuk.edit', $barangMasuk->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('barang-masuk.destroy', $barangMasuk->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang masuk ini?')">Hapus</button>
                        </form>
                        <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
