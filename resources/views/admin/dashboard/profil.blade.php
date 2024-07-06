@extends('kerangka.master')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <!-- Konten dashboard yang telah ada -->
    </div>
@endsection

@section('scripts')
    <script>
        // Fungsi untuk navigasi ke halaman profil
        function goToProfile() {
            // Ganti dengan URL sesuai dengan rute profil Anda
            window.location.href = '{{ route("profile") }}';
        }
    </script>
@endsection
