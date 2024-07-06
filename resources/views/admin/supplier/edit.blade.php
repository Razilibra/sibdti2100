@extends('kerangka.master')

@section('title', 'Edit Supplier')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Supplier</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_supplier">Nama Supplier</label>
                            <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" value="{{ $supplier->nama_supplier }}" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon_supplier">Telepon Supplier</label>
                            <input type="text" name="telepon_supplier" id="telepon_supplier" class="form-control" value="{{ $supplier->telepon_supplier }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Supplier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
