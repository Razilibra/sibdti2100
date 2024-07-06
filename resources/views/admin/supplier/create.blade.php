@extends('kerangka.master')

@section('title', 'Create Supplier')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h4 class="card-title text-center">Create Supplier</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('suppliers.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_supplier">Nama Supplier</label>
                                    <input type="text" id="nama_supplier" name="nama_supplier" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telepon_supplier">Telepon Supplier</label>
                                    <input type="text" id="telepon_supplier" name="telepon_supplier" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
