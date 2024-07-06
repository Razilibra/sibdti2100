@extends('kerangka.master')

@section('title', 'Edit Pengembalian')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Edit Pengembalian</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengembalian.update', $pengembalian->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_peminjaman">ID Peminjaman</label>
                                <input type="text" class="form-control" id="id_peminjaman" name="id_peminjaman" value="{{ old('id_peminjaman', $pengembalian->id_peminjaman) }}" required>
                                @if ($errors->has('id_peminjaman'))
                                    <span class="text-danger">{{ $errors->first('id_peminjaman') }}</span>
                                @endif
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
