@extends('kerangka.master')

@section('title', 'Edit Master Berita')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title text-center">Edit Master Berita</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('master-berita.update', $masterBerita->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Judul -->
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $masterBerita->judul }}" required>
                            </div>

                            <!-- Kategori Berita -->
                            {{-- <div class="form-group">
                                <label for="kategori_berita_id">Kategori Berita</label>
                                <select class="form-control" id="kategori_berita_id" name="kategori_berita_id" required>
                                    @foreach ($kategoriBerita as $kategori)
                                        <option value="{{ $kategori->id }}" {{ $kategori->id == $masterBerita->kategori_berita_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="kategori_berita_id">Kategori Berita</label>
                                <select class="form-control" id="kategori_berita_id" name="kategori_berita_id" required>
                                    @foreach ($kategoriBerita as $kategori)
                                        <option value="{{ $kategori->id }}" {{ $kategori->id == $masterBerita->kategoriBerita->nama_kategori ? 'selected' : '' }}>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- Tanggal Publikasi -->
                            <div class="form-group">
                                <label for="tanggal_publikasi">Tanggal Publikasi</label>
                                <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="{{ $masterBerita->tanggal_publikasi }}" required>
                            </div>



                            <!-- Gambar -->
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                                @if($masterBerita->gambar)
                                    <img src="{{ asset('images/' . $masterBerita->gambar) }}" alt="{{ $masterBerita->judul }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
