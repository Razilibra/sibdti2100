@extends('kerangka.master')
@section('title', 'Tambah Data User')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Tambah Data User</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nama-icon">Nama</label>
                                        <div class="position-relative">
                                            <input type="text" id="nama" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama') }}" placeholder="Masukkan Nama">
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="email-icon">Email</label>
                                        <div class="position-relative">
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="Masukkan Email">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="role-icon">Role</label>
                                        <div class="position-relative">
                                            <select id="role" name="role"
                                                class="form-control @error('role') is-invalid @enderror">
                                                <option value="">Pilih Role</option>
                                                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="Pimpinan" {{ old('role') == 'Pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                                                <option value="Dosen" {{ old('role') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                                <option value="Staff" {{ old('role') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                                <option value="Mahasiswa" {{ old('role') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                            </select>
                                            @error('role')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-people"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="password-icon">Password</label>
                                        <div class="position-relative">
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                value="{{ old('password') }}" placeholder="Masukkan Password">
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="status-icon">Status</label>
                                        <div class="position-relative">
                                            <select id="status" name="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-check-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
