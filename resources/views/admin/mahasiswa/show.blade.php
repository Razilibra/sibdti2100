@extends('kerangka.master')

@section('title', 'Detail Mahasiswa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center">Detail Mahasiswa</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" disabled>
            </div>
            <div class="form-group">
                <label for="id_user">Nama</label>
                <input type="text" id="id_user" name="id_user" class="form-control" value="{{ $mahasiswa->user->nama }}" disabled>
            </div>
            <div class="form-group">
                <label for="program_studi">Program Studi</label>
                <input type="text" id="program_studi" name="program_studi" class="form-control" value="{{ $mahasiswa->program_studi }}" disabled>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <input type="text" id="angkatan" name="angkatan" class="form-control" value="{{ $mahasiswa->angkatan }}" disabled>
            </div>
            <div class="form-group">
                <label for="ipk">IPK</label>
                <input type="text" id="ipk" name="ipk" class="form-control" value="{{ $mahasiswa->ipk }}" disabled>
            </div>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
