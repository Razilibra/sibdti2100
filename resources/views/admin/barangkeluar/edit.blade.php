@extends('kerangka.master')

@section('title', 'Edit Barang Keluar')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center">Edit Barang Keluar</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('barang_keluar.update', $barangKeluar->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_peminjaman">ID Peminjaman</label>
                    <select id="id_peminjaman" name="id_peminjaman" class="form-control" required>
                        @foreach($peminjamans as $peminjaman)
                            <option value="{{ $peminjaman->id }}" {{ $peminjaman->id == $barangKeluar->id_peminjaman ? 'selected' : '' }}>{{ $peminjaman->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="date" id="tanggal_keluar" name="tanggal_keluar" class="form-control" value="{{ $barangKeluar->tanggal_keluar }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
