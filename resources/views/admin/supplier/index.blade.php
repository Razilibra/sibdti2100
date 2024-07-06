@extends('kerangka.master')

@section('title', 'Daftar Supplier')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-lg">
                        <h4 class="card-title text-center">Daftar Supplier</h4>
                        <button class="btn btn-danger mt-2 mb-2" onclick="window.print()"><i class="bi bi-download"></i> PDF</button>
                        <a href="{{ route('suppliers.create') }}" class="btn btn-primary float-right">Create Supplier</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if ($supplier->isEmpty())
                                <p>Tidak ada data supplier.</p>
                            @else
                                <div class="table-responsive shadow-lg">
                                    <table id="supplierTable" class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Supplier</th>
                                                <th>Telepon Supplier</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($supplier as $Suppliers)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $Suppliers->nama_supplier }}</td>
                                                    <td>{{ $Suppliers->telepon_supplier }}</td>
                                                    <td>
                                                        <a href="{{ route('suppliers.show', $Suppliers->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                        <a href="{{ route('suppliers.edit', $Suppliers->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('suppliers.destroy', $Suppliers->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">Hapus</button>
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
            $('#supplierTable').DataTable({
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
