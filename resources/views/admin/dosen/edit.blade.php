@extends('kerangka.master')

@section('title', 'Edit Dosen')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Edit Dosen</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" id="nip" name="nip" class="form-control" value="{{ $dosen->nip }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_user"> Nama </label>
                                    <input type="text" id="id_user" name="id_user" class="form-control" value="{{ $dosen->id_user }}">
                                </div>

                                <div class="form-group">
                                    <label for="jabatan_akademik">Jabatan Akademik</label>
                                    <input type="text" id="jabatan_akademik" name="jabatan_akademik" class="form-control" value="{{ $dosen->jabatan_akademik }}">
                                </div>
                                <div class="form-group">
                                    <label for="no_telepon">No Telepon</label>
                                    <input type="text" id="no_telepon" name="no_telepon" class="form-control" value="{{ $dosen->no_telepon }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{ $dosen->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="text" id="foto" name="foto" class="form-control" value="{{ $dosen->foto }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
