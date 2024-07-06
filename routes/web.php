<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\MasterBeritaController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\NotificationController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\SearchController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Login


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login.store');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Rute untuk menyimpan data registrasi
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//forget password
Route::get('/auth-forgot-password.html', function () {
    return view('auth.forgot-password');
})->name('forgot-password');
// Rute untuk menampilkan form pengaturan ulang kata sandi
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// Rute untuk mengirim email pengaturan ulang kata sandi
Route::post('/forgot-password', [
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
    'as' => 'password.email'
]);

// Rute untuk menampilkan form reset kata sandi
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

// Rute untuk menyimpan kata sandi yang direset
Route::post('/reset-password', [
    'uses' => 'Auth\ResetPasswordController@reset',
    'as' => 'password.update'
]);

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');



//
// Tampilan FrontEnd
Route::get('/', function () {
    return view('frontend.index');
});

//Dashboard
Route::middleware('role:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Rute-rute lain yang hanya dapat diakses oleh admin di sini
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Dashboard route


// // Notification routes
// Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notification.show');

// // Profile routes
// Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

// // Search route
// Route::get('/search', [SearchController::class, 'search'])->name('search');

// // Logout route
// Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');
//User


// Route::get('/export-users', [UserController::class, 'exportExcel']);

Route::resource('/user', UserController::class);
Route::get('users/export', [UserController::class, 'export'])->name('users.export');
Route::post('users/import', [UserController::class, 'import'])->name('users.import');
//pemnjaman

Route::resource('/peminjaman', PeminjamanController::class);

//Berita
Route::get('master-berita/{masterBerita}/edit', [MasterBeritaController::class, 'edit'])->name('master-berita.edit');
Route::resource('/master-berita', MasterBeritaController::class);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');



// kategori berita
Route::resource('/kategori-berita', KategoriBeritaController::class);

//  Barang Masuk
Route::resource('/barang-masuk', BarangMasukController::class);

//Supplier
Route::resource('/suppliers', SupplierController::class);


//prodi
Route::get('/prodi', [ProdiController::class, 'index']);


//barang
Route::get('/barangimport', function () {
    $title = "Import Data Barang";
    $role = session('role');
    return view('admin.barang.import', compact('title', 'role'));
})->name('barang.formimport');

Route::get('/barang/search', [BarangController::class, 'search'])->name('barang.search');
Route::resource('/barang', BarangController::class);
Route::get('download-barang-pdf', [BarangController::class, 'downloadPDF'])->name('barang.downloadPDF');
Route::get('/barangexport', [BarangController::class, 'export'])->name('barang.export');
Route::post('barang/import', [BarangController::class, 'import'])->name('barang.import');







// // pengembalian
Route::resource('/pengembalian', PengembalianController::class);


//user

Route::resource('/users', UserController::class);


//mahasiswa
Route::resource('/mahasiswa', MahasiswaController::class);
Route::put('/mahasiswa/{id}', 'MahasiswaController@update')->name('mahasiswa.update');


//dosen_staff
Route::resource('/dosen', DosenController::class);


Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen/store', [DosenController::class, 'store'])->name('dosen.store');


//staff
Route::resource('/staff', StaffController::class);


// //log aktifitas

//     Route::get('/data-log', [LogController::class, 'index'])->name('log.index');
//     Route::get('log/create', [LogController::class, 'create'])->name('log.create');
//     Route::post('log', [LogController::class, 'store'])->name('log.store');
//     Route::get('log/{id}', [LogController::class, 'show'])->name('log.show');
//     Route::get('log/{id}/edit', [LogController::class, 'edit'])->name('log.edit');
//     Route::put('log/{id}', [LogController::class, 'update'])->name('log.update');
//     Route::delete('log/{id}', [LogController::class, 'destroy'])->name('log.destroy');


//barang keluar
Route::resource('/barang_keluar', BarangKeluarController::class);
Route::get('/barang-keluar/search', [BarangKeluarController::class, 'search'])->name('barang_keluar.search');



//log



Route::resource('/logs', LogController::class);


