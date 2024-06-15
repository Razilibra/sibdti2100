<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Tampilan FrontEnd
Route::get('/', function () {
    return view('frontend.index');
});

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//User
Route::get('/data-user', [UserController::class, 'index'])->name('user.index');
// Create-User
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');

