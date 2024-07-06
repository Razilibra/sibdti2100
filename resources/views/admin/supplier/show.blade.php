@extends('kerangka.master')

@section('title', 'Detail Supplier')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Supplier</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Supplier:</label>
                                <p>{{ $supplier->nama_supplier }}</p>
                            </div>
                            <div class="form-group">
                                <label>Telepon Supplier:</label>
                                <p>{{ $supplier->telepon_supplier }}</p>
                            </div>
                            <a href="{{ route('suppliers.index') }}" class="btn btn-primary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
