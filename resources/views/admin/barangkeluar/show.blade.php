@extends('kerangka.master')

@section('title', 'Detail Barang Keluar')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center">Detail Barang Keluar</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="id_peminjaman">ID Peminjaman</label>
                <input type="text" id="id_peminjaman" name="id_peminjaman" class="form-control" value="{{ $barangKeluar->id_peminjaman }}" disabled>
            </div>
            <div class="form-group">
                <label for="jumlah_keluar">Jumlah Keluar</label>
                <input type="text" id="jumlah_keluar" name="jumlah_keluar" class="form-control" value="{{ $barangKeluar->jumlah_keluar }}" disabled>
            </div>
            <div class="form-group">
                <label for="tanggal_keluar">Tanggal Keluar</label>
                <input type="text" id="tanggal_keluar" name="tanggal_keluar" class="form-control" value="{{ $barangKeluar->tanggal_keluar }}" disabled>
            </div>
            <a href="{{ route('barang_keluar.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
