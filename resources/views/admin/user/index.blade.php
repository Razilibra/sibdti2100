@extends('kerangka.master')

@section('title', 'User List')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header shadow-lg">
            <h4 class="card-title text-center">Data User</h4>
            <a href="{{ route('user.create') }}" class="btn btn-primary float-right">Create User</a>
            <a href="{{ route('users.export') }}" class="btn btn-primary">Export Users</a>

        </div>

            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Choose Excel file</label>
                    <input type="file" name="file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Import Users</button>
            </form>

        </div>
        {{-- <div class="card-body"><a href="{{ url('/export-users') }}" class="btn btn-success mb-3">Ekspor ke Excel</a></div> --}}


        <div class="card-body">
            @if ($user->isEmpty())
                <p>No users found.</p>
            @else
                <div class="table-responsive shadow-lg">
                    <table class="table table-bordered" id="user-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $item->id) }}" class="btn btn-sm btn-info">Show</a>
                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
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

    <!-- Add DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#user-table').DataTable({
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
