@extends('kerangka.master')

@section('title', 'Tambah Master Berita')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title text-center">Tambah Master Berita</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('master-berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                             <div class="form-group">
                                    <label for="kategori_berita_id">Kategori Berita</label>
                                    <select class="form-control" id="kategori_berita_id" name="kategori_berita_id" required>
                                        @foreach ($kategoriBeritas as $kategoriBerita)
                                            <option value="{{ $kategoriBerita->id }}">{{ $kategoriBerita->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_publikasi">Tanggal Publikasi</label>
                                <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
