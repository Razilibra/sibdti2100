@extends('kerangka.master')

@section('title', 'Import Data Barang')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title text-center">Import Data Barang</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('barang.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Choose Excel file</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Import Barang</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection




