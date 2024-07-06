@extends('kerangka.master')

@section('title', 'Create Dosen')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h4 class="card-title text-center">Create Dosen</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" id="nip" name="nip" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="id_user">Nama</label>
                                    <select name="id_user" id="id_user" class="form-control" required>
                                        <option value="">--- pilih user --</option>
                                        @foreach ($user as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jabatan_akademik">Jabatan Akademik</label>
                                    <input type="text" id="jabatan_akademik" name="jabatan_akademik" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="no_telepon">No Telepon</label>
                                    <input type="text" id="no_telepon" name="no_telepon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="text" id="foto" name="foto" class="form-control">
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
