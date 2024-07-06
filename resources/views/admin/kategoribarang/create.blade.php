@extends('kerangka.master')

@section('title', 'Tambah Kategori Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Kategori Barang</h4>
            <a href="{{ route('kategori-barang.index') }}" class="btn btn-primary float-end">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori-barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="barang" name="barang" required>
                </div>
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <input type="text" class="form-control" id="kondisi" name="kondisi" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>
                {{-- <div class="mb-3">
                    <label for="id_supplier" class="form-label">Supplier</label>
                    <select class="form-select" id="id_supplier" name="id_supplier" required>
                        <option value="">Pilih Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
