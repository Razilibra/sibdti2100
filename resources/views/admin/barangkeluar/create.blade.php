@extends('kerangka.master')

@section('title', 'Tambah Barang Keluar')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header">
            <h4 class="card-title text-center">Tambah Barang Keluar</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('barang_keluar.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id_peminjaman">ID Peminjaman</label>
                    <select id="id_peminjaman" name="id_peminjaman" class="form-control" required>
                        @foreach($peminjamans as $peminjaman)
                            <option value="{{ $peminjaman->id }}">{{ $peminjaman->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="date" id="tanggal_keluar" name="tanggal_keluar" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
