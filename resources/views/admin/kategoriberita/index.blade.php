@extends('kerangka.master')

@section('title', 'Daftar Kategori Berita')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title text-center">Daftar Kategori Berita</h4>
                        <a href="{{ route('kategori-berita.create') }}" class="btn btn-primary float-right">Create Kategori Berita</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if ($kategoriBerita->isEmpty())
                                <p>Tidak ada data kategori berita.</p>
                            @else
                                <div class="table-responsive shadow-lg">
                                    <table id="kategoriBeritaTable" class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kategoriBerita as $kategori)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $kategori->nama_kategori }}</td>
                                                    <td>{{ $kategori->deskripsi }}</td>
                                                    <td>
                                                        <a href="{{ route('kategori-berita.show', $kategori->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                        <a href="{{ route('kategori-berita.edit', $kategori->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('kategori-berita.destroy', $kategori->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori berita ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#kategoriBeritaTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
