@extends('kerangka.master')

@section('title', 'Tambah Pengembalian')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title text-center">Tambah Pengembalian</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengembalian.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="id_peminjaman">ID Peminjaman</label>
                                <select class="form-control" id="id_peminjaman" name="id_peminjaman" required>
                                    <option value="">Pilih ID Peminjaman</option>
                                    @foreach($peminjaman as $pinjam)
                                        <option value="{{ $pinjam->id }}" {{ old('id_peminjaman') == $pinjam->id ? 'selected' : '' }}>
                                            {{ $pinjam->id }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_peminjaman'))
                                    <span class="text-danger">{{ $errors->first('id_peminjaman') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
