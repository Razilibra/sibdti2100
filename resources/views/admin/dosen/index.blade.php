@extends('kerangka.master')

@section('title', 'Daftar Dosen')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header shadow-lg">
                    <h4 class="card-title text-center">Daftar Dosen</h4>
                    <a href="{{ route('dosen.create') }}" class="btn btn-primary float-right">Create Dosen</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if ($dosen->isEmpty())
                            <p class="text-center">Tidak ada data dosen.</p>
                        @else
                            <div class="table-responsive shadow-lg">
                                <table class="table table-bordered table-hover" id="dosen-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Dosen</th>
                                            <th>Jabatan Akademik</th>
                                            <th>No Telepon</th>
                                            <th>Email</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dosen as $d)
                                            <tr class="shadow-sm">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->nip }}</td>
                                                <td>{{ $d->user->nama }}</td>
                                                <td>{{ $d->jabatan_akademik }}</td>
                                                <td>{{ $d->no_telepon }}</td>
                                                <td>{{ $d->email }}</td>
                                                <td>
                                                    @if ($d->foto)
                                                        <img src="{{ asset('images/' . $d->foto) }}" alt="Foto" style="max-width: 100px;">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('dosen.show', $d->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                    <a href="{{ route('dosen.edit', $d->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('dosen.destroy', $d->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus dosen ini?')">Hapus</button>
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
        $('#dosen-table').DataTable({
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
