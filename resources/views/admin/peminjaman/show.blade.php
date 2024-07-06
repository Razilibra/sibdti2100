@extends('kerangka.master')

@section('title', 'Detail Peminjaman')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Peminjaman</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_barang">Barang</label>
                                <p>{{ $peminjaman->barang->nama_barang }}</p>
                            </div>
                            <div class="form-group">
                                <label for="id_user">User</label>
                                <p>{{ $peminjaman->user->nama }}</p>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <p>{{ $peminjaman->jumlah }}</p>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <p>{{ $peminjaman->tanggal_pinjam }}</p>
                            </div>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
