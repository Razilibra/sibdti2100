@extends('kerangka.master')

@section('title', 'Detail Dosen')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Detail Dosen</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>ID: {{ $dosen->id }}</p>
                            <p>NIP: {{ $dosen->nip }}</p>
                            <p>Nama: {{ $dosen->user->nama }}</p>
                            <p>Jabatan Akademik: {{ $dosen->jabatan_akademik }}</p>
                            <p>No Telepon: {{ $dosen->no_telepon }}</p>
                            <p>Email: {{ $dosen->email }}</p>
                            <p>Foto: {{ $dosen->foto }}</p>
                            <a href="{{ route('dosen.index') }}" class="btn btn-primary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
