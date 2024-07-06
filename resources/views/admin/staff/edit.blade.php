@extends('kerangka.master')

@section('title', 'Edit Staff')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Edit Staff</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ $staff->nik }}" required>
                            </div>
                            <div class="form-group">
                                <label for="id_user"> Nama </label>
                                <input type="text" id="id_user" name="id_user" class="form-control" value="{{ $staff->id_user }}">
                            </div>
                            <div class="form-group">
                                <label for="jabatan_akademik">Jabatan Akademik</label>
                                <input type="text" class="form-control" id="jabatan_akademik" name="jabatan_akademik" value="{{ $staff->jabatan_akademik }}" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">No Telepon</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $staff->no_telepon }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $staff->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
