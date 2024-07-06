@extends('kerangka.master')

@section('title', 'Edit Kategori Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Kategori Barang</h4>
            <a href="{{ route('kategori-barang.index') }}" class="btn btn-primary float-end">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori-barang.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="barang" name="barang" value="{{ old('barang', $kategori->barang) }}" required>
                </div>
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <input type="text" class="form-control" id="kondisi" name="kondisi" value="{{ old('kondisi', $kategori->kondisi) }}" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    @if ($kategori->foto)
                        <img src="{{ asset($kategori->foto) }}" alt="Foto Kategori" class="mt-2" style="max-width: 200px;">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $kategori->jumlah) }}" required>
                </div>
                <div class="mb-3">
                    <label for="id_supplier" class="form-label">Supplier</label>
                    <select class="form-select" id="id_supplier" name="id_supplier" required>
                        <option value="">Pilih Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $supplier->id == $kategori->id_supplier ? 'selected' : '' }}>{{ $supplier->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
