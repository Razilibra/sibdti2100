@extends('kerangka.master')

@section('title', 'Log Aktivitas')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title text-center">Log Aktivitas</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('logs.create') }}" class="btn btn-sm btn-success mb-3">Tambah Log Baru</a>
                        <div class="table-responsive shadow-lg">
                            <table class="table table-striped" id="log-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Tipe Aktivitas</th>
                                        <th>Tabel Terkait</th>
                                        <th>Data Sebelum</th>
                                        <th>Data Sesudah</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $log->id_user }}</td>
                                            <td>{{ $log->tipe_aktivitas }}</td>
                                            <td>{{ $log->tabel_terkait }}</td>
                                            <td>{{ $log->data_sebelum }}</td>
                                            <td>{{ $log->data_sesudah }}</td>
                                            <td>{{ $log->created_at }}</td>
                                            <td>
                                                <a href="{{ route('logs.show', $log->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                <a href="{{ route('logs.edit', $log->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('logs.destroy', $log->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus log ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $logs->links() }}
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
            $('#log-table').DataTable({
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
