@extends('kerangka.master')

@section('title', 'Daftar Pengembalian')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header shadow-lg">
                    <h4 class="card-title text-center">Daftar Pengembalian</h4>
                    <a href="{{ route('pengembalian.create') }}" class="btn btn-primary float-right">Tambah Pengembalian</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if ($pengembalian->isEmpty())
                            <p>Tidak ada data pengembalian.</p>
                        @else
                            <div class="table-responsive shadow-lg">
                                <table id="pengembalianTable" class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Peminjaman</th>
                                            <th>Waktu Pengembalian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengembalian as $Pengembalian)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $Pengembalian->id_peminjaman }}</td>
                                                <td>{{ $Pengembalian->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('pengembalian.show', $Pengembalian->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                    <a href="{{ route('pengembalian.edit', $Pengembalian->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('pengembalian.destroy', $Pengembalian->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengembalian ini?')">Hapus</button>
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
        $('#pengembalianTable').DataTable({
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
