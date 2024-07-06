@extends('kerangka.master')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header">
            <h4 class="card-title text-center">Tambah Mahasiswa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="id_user">Nama</label>
                    <select name="id_user" id="id_user" class="form-control" required>
                        <option value="">--- Pilih Nama User --</option>
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="program_studi">Program Studi</label>
                    <select id="program_studi" name="program_studi" class="form-control" required>
                        <option value="">--Pilih Program Studi --</option>
                        <option value="D4 Teknologi Rekayasa Perangkat Lunak">D4 Teknologi Rekayasa Perangkat Lunak</option>
                        <option value="D3 Manajemen Infomatika">D3 Manajemen Infomatika</option>
                        <option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <select id="angkatan" name="angkatan" class="form-control" required>
                        <option value="">-- Pilih Angkatan --</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="ipk">IPK</label>
                    <input type="text" id="ipk" name="ipk" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
