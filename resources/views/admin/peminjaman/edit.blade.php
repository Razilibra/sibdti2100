@extends('kerangka.master')

@section('title', 'Edit Peminjaman')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Edit Peminjaman</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    <select id="id_barang" name="id_barang" class="form-control" required>
                                        @foreach($barangs as $barang)
                                            <option value="{{ $barang->id }}" {{ $barang->id == $peminjaman->id_barang ? 'selected' : '' }}>{{ $barang->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_user">User</label>
                                    <select id="id_user" name="id_user" class="form-control" required>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ $user->id == $peminjaman->id_user ? 'selected' : '' }}>{{ $user->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ $peminjaman->jumlah }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
