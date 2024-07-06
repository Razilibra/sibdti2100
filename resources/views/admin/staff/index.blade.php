@extends('kerangka.master')

@section('title', 'Daftar Staff')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header shadow-lg">
                    <h4 class="card-title text-center">Daftar Staff</h4>
                    <a href="{{ route('staff.create') }}" class="btn btn-primary float-right">Create Staff</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if ($staff->isEmpty())
                            <p>Tidak ada data staff.</p>
                        @else
                            <div class="table-responsive shadow-lg">
                                <table class="table table-bordered table-hover" id="staff-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Staff</th>
                                            <th>Jabatan Akademik</th>
                                            <th>No Telepon</th>
                                            <th>Email</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff as $item)
                                            <tr class="shadow-sm">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nik }}</td>
                                                <td>{{ $item->id_user }}</td>
                                                <td>{{ $item->jabatan_akademik }}</td>
                                                <td>{{ $item->no_telepon }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    @if ($item->foto)
                                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Staff" style="max-width: 100px;">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('staff.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                    <a href="{{ route('staff.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('staff.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus staff ini?')">Hapus</button>
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
        $('#staff-table').DataTable({
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
