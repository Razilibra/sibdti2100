{{-- sidebar --}}

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="{{ asset('template/assets/images/logo/favicon.png') }}" alt="Logo" style="width: 100px; height: 100px;">
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>


        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                        <i class="bi bi-speedometer2"></i> <!-- Icon untuk Dashboard -->
                        <span>Dashboard</span>
                    </a>
                </li>


                @if($role == "pimpinan")
                <li class="sidebar-item">
                    <a href="/barang" class='sidebar-link'>
                        <i class="bi bi-box-seam"></i> <!-- Icon untuk Stok Barang -->
                        <span>Stok Barang</span>
                    </a>
                </li>
                @endif


                @if($role != "pimpinan")
                <li class="sidebar-title">Manajemen Peminjaman</li>
                <li class="sidebar-item">
                    <a href="/peminjaman" class='sidebar-link'>
                        <i class="bi bi-arrow-down-circle"></i> <!-- Icon untuk Peminjaman -->
                        <span>Peminjaman</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/pengembalian" class='sidebar-link'>
                        <i class="bi bi-arrow-up-circle"></i> <!-- Icon untuk Pengembalian -->
                        <span>Pengembalian</span>
                    </a>
                </li>
                @if ($role == "admin")
                <li class="sidebar-title">Manajemen Barang</li>
                <li class="sidebar-item">
                    <a href="/barang-masuk" class='sidebar-link'>
                        <i class="bi bi-arrow-down-circle-fill"></i> <!-- Icon untuk Barang Masuk -->
                        <span>Barang Masuk</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/barang_keluar" class='sidebar-link'>
                        <i class="bi bi-arrow-up-circle-fill"></i> <!-- Icon untuk Barang Keluar -->
                        <span>Barang Keluar</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/barang" class='sidebar-link'>
                        <i class="bi bi-box-seam"></i> <!-- Icon untuk Stok Barang -->
                        <span>Stok Barang</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/suppliers" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i> <!-- Icon untuk Supplier -->
                        <span>Supplier</span>
                    </a>
                </li>

                <li class="sidebar-title">Manajemen Berita</li>
                <li class="sidebar-item">
                    <a href="/kategori-berita" class='sidebar-link'>
                        <i class="bi bi-tags-fill"></i> <!-- Icon untuk Kategori Berita -->
                        <span>Kategori Berita</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/master-berita" class='sidebar-link'>
                        <i class="bi bi-newspaper"></i> <!-- Icon untuk Berita -->
                        <span>Berita</span>
                    </a>
                </li>

                <li class="sidebar-title">Manajemen Pengguna</li>
                <li class="sidebar-item">
                    <a href="/user" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i> <!-- Icon untuk User -->
                        <span>User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/dosen" class='sidebar-link'>
                        <i class="bi bi-person-workspace"></i> <!-- Icon untuk Dosen -->
                        <span>Dosen</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/staff" class='sidebar-link'>
                        <i class="bi bi-person-workspace"></i> <!-- Icon untuk Staff -->
                        <span>Staff</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/mahasiswa" class='sidebar-link'>
                        <i class="bi bi-person"></i> <!-- Icon untuk Mahasiswa -->
                        <span>Mahasiswa</span>
                    </a>
                </li>

                <li class="sidebar-title">Laporan Data Barang</li>
                <li class="sidebar-item">
                    <a href="/barang" class='sidebar-link'>
                        <i class="bi bi-box-seam"></i> <!-- Icon untuk Barang -->
                        <span>Data Barang</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/barang-masuk" class='sidebar-link'>
                        <i class="bi bi-arrow-down-circle-fill"></i> <!-- Icon untuk Barang Masuk -->
                        <span>Data Barang Masuk</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/barang_keluar" class='sidebar-link'>
                        <i class="bi bi-arrow-up-circle-fill"></i> <!-- Icon untuk Barang Keluar -->
                        <span>Data Barang Keluar</span>
                    </a>
                </li>

                <li class="sidebar-title">Aktivitas</li>
                <li class="sidebar-item">
                    <a href="/logs" class='sidebar-link'>
                        <i class="bi bi-clock-history"></i> <!-- Icon untuk Log Aktivitas -->
                        <span>Log Aktivitas</span>
                    </a>
                </li>
                @endif
                @endif

                <li class="sidebar-title">Account & Authentication</li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-shield-lock-fill"></i>
                        <span>Authentication</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/logout" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i> <!-- Icon untuk Logout -->
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
