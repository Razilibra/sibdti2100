@extends('kerangka.master')

@section('title', 'Buat Log Baru')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h4 class="card-title text-center">Buat Log Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('logs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="id_user">User ID</label>
                                <input type="number" name="id_user" id="id_user" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tipe_aktivitas">Tipe Aktivitas</label>
                                <input type="text" name="tipe_aktivitas" id="tipe_aktivitas" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tabel_terkait">Tabel Terkait</label>
                                <input type="text" name="tabel_terkait" id="tabel_terkait" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="data_sebelum">Data Sebelum</label>
                                <textarea name="data_sebelum" id="data_sebelum" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="data_sesudah">Data Sesudah</label>
                                <textarea name="data_sesudah" id="data_sesudah" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
