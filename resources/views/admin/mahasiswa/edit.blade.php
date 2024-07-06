@extends('kerangka.master')

@section('title', 'Edit Mahasiswa')

@section('content')
    <d class="card">
        <div class="card-header">
            <h4 class="card-title text-center">Edit Mahasiswa</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim', $mahasiswa->nim) }}" required>
                    @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_user">User</label>
                    <select id="id_user" name="id_user" class="form-control @error('id_user') is-invalid @enderror" required>
                        <option value="">Pilih User</option>
                        @foreach($user as $usr)
                            <option value="{{ $usr->id }}" {{ old('id_user', $mahasiswa->user_id) == $usr->id ? 'selected' : '' }}>{{ $usr->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="program_studi">Program Studi</label>
                    <input type="text" id="program_studi" name="program_studi" class="form-control @error('program_studi') is-invalid @enderror" value="{{ old('program_studi', $mahasiswa->program_studi) }}" required>
                    @error('program_studi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input type="text" id="angkatan" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required>
                    @error('angkatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ipk">IPK</label>
                    <input type="text" id="ipk" name="ipk" class="form-control @error('ipk') is-invalid @enderror" value="{{ old('ipk', $mahasiswa->ipk) }}" required>
                    @error('ipk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
