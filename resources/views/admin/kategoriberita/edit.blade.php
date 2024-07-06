@extends('kerangka.master')

@section('title', 'Edit Kategori Berita')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Edit Kategori Berita</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('kategori-berita.update', $kategoriBerita->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" value="{{ $kategoriBerita->nama_kategori }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" value="{{ $kategoriBerita->deskripsi }}" required>
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
