@extends('kerangka.master')

@section('title', 'Detail Log')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Log</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID:</th>
                                <td>{{ $log->id }}</td>
                            </tr>
                            <tr>
                                <th>User:</th>
                                <td>{{ $log->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Tipe Aktivitas:</th>
                                <td>{{ $log->tipe_aktivitas }}</td>
                            </tr>
                            <tr>
                                <th>Tabel Terkait:</th>
                                <td>{{ $log->tabel_terkait }}</td>
                            </tr>
                            <tr>
                                <th>Data Sebelum:</th>
                                <td>{{ $log->data_sebelum }}</td>
                            </tr>
                            <tr>
                                <th>Data Sesudah:</th>
                                <td>{{ $log->data_sesudah }}</td>
                            </tr>
                            <tr>
                                <th>Waktu:</th>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('logs.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
