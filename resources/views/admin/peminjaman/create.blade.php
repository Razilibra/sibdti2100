@extends('kerangka.master')

@section('title', 'Create Peminjaman')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h4 class="card-title text-center">Create Peminjaman</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('peminjaman.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    <select id="id_barang" name="id_barang" class="form-control" required>
                                        @foreach($barangs as $barang)
                                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_user">User</label>
                                    <select id="id_user" name="id_user" class="form-control" required>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" id="jumlah" name="jumlah" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
