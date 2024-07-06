@extends('kerangka.master')

@section('title', 'Detail Pengembalian')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Detail Pengembalian</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_peminjaman">ID Peminjaman:</label>
                            <p>{{ $pengembalian->id_peminjaman }}</p>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Waktu Pengembalian:</label>
                            <p>{{ $pengembalian->created_at }}</p>
                        </div>
                        <a href="{{ route('pengembalian.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
