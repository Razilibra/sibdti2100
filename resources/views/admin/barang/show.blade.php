@extends('kerangka.master')

@section('title', 'Detail Barang')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title text-center">Detail Barang</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang:</label>
                            <p>{{ $barang->nama_barang }}</p>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang:</label>
                                <p>{{ $barang->kode_barang }}</p>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="posisi">posisi:</label>
                                    <p>{{ $barang->posisi }}</p>
                                </div>
                        <div class="form-group">
                            <label for="stok">Stok:</label>
                            <p>{{ $barang->stok }}</p>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            @if ($barang->foto)
                                <img src="{{ asset('images/' . $barang->foto) }}" alt="Foto Barang" style="max-width: 100px;">
                            @else
                                <span>No Image</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <a href="{{ route('barang.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
