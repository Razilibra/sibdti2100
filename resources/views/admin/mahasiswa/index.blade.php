@extends('kerangka.master')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title text-center">Daftar Mahasiswa</h4>
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary float-right">Tambah Mahasiswa</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if ($mahasiswa->isEmpty())
                                <p class="text-center">Tidak ada data mahasiswa.</p>
                            @else
                                <div class="table-responsive shadow-lg">
                                    <table class="table table-bordered table-hover" id="mahasiswa-table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Program Studi</th>
                                                <th>Angkatan</th>
                                                <th>IPK</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mahasiswa as $item)
                                                <tr class="shadow">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nim }}</td>
                                                    <td>{{ $item->user->nama }}</td>
                                                    <td>{{ $item->program_studi }}</td>
                                                    <td>{{ $item->angkatan }}</td>
                                                    <td>{{ $item->ipk }}</td>
                                                    <td>
                                                        <a href="{{ route('mahasiswa.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                        <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">Hapus</button>
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

    <!-- Add DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mahasiswa-table').DataTable({
                "paging": true, // Menampilkan tombol halaman
                "lengthChange": true, // Menampilkan pilihan jumlah entri
                "searching": true, // Aktifkan fitur pencarian
                "ordering": true, // Aktifkan pengurutan kolom
                "info": true, // Menampilkan informasi halaman
                "autoWidth": false, // Menonaktifkan auto-width
                "responsive": true // Mengaktifkan responsivitas tabel
            });
        });
    </script>
@endsection
