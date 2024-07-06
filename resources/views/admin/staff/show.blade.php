@extends('kerangka.master')

@section('title', 'Detail Staff')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Detail Staff</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <p>{{ $staff->nik }}</p>
                        </div>
                        <div class="form-group">
                            <label for="id_user">Nama</label>
                            <p>{{ $staff->user->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="jabatan_akademik">Jabatan Akademik</label>
                            <p>{{ $staff->jabatan_akademik }}</p>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <p>{{ $staff->no_telepon }}</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <p>{{ $staff->email }}</p>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            @if ($staff->foto)
                                <img src="{{ asset('storage/' . $staff->foto) }}" alt="Foto Staff" style="max-width: 100px;">
                            @else
                                <span>No Image</span>
                            @endif
                        </div>
                        <a href="{{ route('staff.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
