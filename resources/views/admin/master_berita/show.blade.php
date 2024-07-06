@extends('kerangka.master')

@section('title', 'Detail Master Berita')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Master Berita</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" value="{{ $masterBerita->judul }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kategori_berita_id">Kategori Berita</label>
                                <input type="text" class="form-control" id="kategori_berita_id" value="{{ $masterBerita->kategoriBerita->nama_kategori }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="gambar">gambar:</label>
                                @if ($masterBerita->gambar)
                                <img src="{{ asset('images/' . $masterBerita->gambar) }}" alt="{{ $masterBerita->judul }}" width="100">
                            @else
                                <p>Tidak ada gambar</p>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="tanggal_publikasi">Tanggal Publikasi</label>
                                <input type="date" class="form-control" id="tanggal_publikasi" value="{{ $masterBerita->tanggal_publikasi }}" readonly>
                            </div>
                            <a href="{{ route('master-berita.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
