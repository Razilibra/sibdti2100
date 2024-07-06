@extends('kerangka.master')

@section('title', 'Daftar Master Berita')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title text-center">Daftar Berita</h4>
                        <a href="{{ route('master-berita.create') }}" class="btn btn-primary float-right">Create Berita</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($masterBeritas->isEmpty())
                                <p>Tidak ada data master berita.</p>
                            @else
                                <div class="table-responsive shadow-lg">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Kategori Berita</th>
                                                <th>Tanggal Publikasi</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($masterBeritas as $masterBerita)
                                                <tr class="shadow-sm">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $masterBerita->judul }}</td>
                                                    <td>{{ $masterBerita->kategoriBerita->nama_kategori }}</td>
                                                    <td>{{ $masterBerita->tanggal_publikasi }}</td>
                                                    <td>
                                                        @if ($masterBerita->gambar)
                                                            <img src="{{ asset('images/' . $masterBerita->gambar) }}" alt="{{ $masterBerita->judul }}" width="100">
                                                        @else
                                                            <p>Tidak ada gambar</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('master-berita.show', $masterBerita->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                        <a href="{{ route('master-berita.edit', $masterBerita->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('master-berita.destroy', $masterBerita->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $masterBeritas->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
