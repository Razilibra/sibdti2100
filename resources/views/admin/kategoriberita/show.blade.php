@extends('kerangka.master')

@section('title', 'Detail Kategori Berita')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Kategori Berita</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <h5>Nama Kategori: {{ $kategoriBerita->nama_kategori }}</h5>
                            <p>Deskripsi: {{ $kategoriBerita->deskripsi }}</p>
                            <a href="{{ route('kategori-berita.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
