@extends('kerangka.master')

@section('title', 'Tambah Barang')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title text-center">Tambah Barang</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                            </div>
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                            </div>
                            <div class="form-group">
                                <label for="posisi">posisi</label>
                                <select class="form-control" id="posisi" name="posisi" required>
                                    <option>-- pilih lab --</option>
                                    <option value="Lab-201">Lab-201</option>
                                    <option value="Lab-202">Lab-202</option>
                                    <option value="Lab-204">Lab-204</option>
                                    <option value="Lab-208">Lab-208</option>
                                    <option value="Lab-301">Lab-301</option>
                                    <option value="Lab-302">Lab-302</option>
                                    <option value="Lab-306">Lab-306</option>
                                    <option value="Lab-308">Lab-308</option>
                                    <option value="Lab-310">Lab-310</option>
                                    <option value="Lab-311">Lab-311</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok" required>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="" disabled selected></option>
                                    <option value="1">1. Barang Habis Pakai</option>
                                    <option value="2">2. Barang Tersedia </option>
                                    <option value="3 ">3. Barang Rusak</option>
                                    <option value="4">4. Barang Baru</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
