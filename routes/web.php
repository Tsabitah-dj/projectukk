<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ahliwariscontroller;
use App\Http\Controllers\dataahliwariscontroller;
use App\Http\Controllers\perbulancontroller;
use App\Http\Controllers\pertahuncontroller;
use App\Http\Controllers\AuthController;


// ===============================
//  AUTH (Boleh diakses semua)
// ===============================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ===============================
//  ROUTES USER (HARUS LOGIN)
//  └── user biasa hanya boleh akses data ahli waris
// ===============================
Route::middleware(['auth'])->group(function () {

    // USER BISA AKSES INI
    Route::resource('dataahliwaris', dataahliwariscontroller::class);
});



//  ROUTES ADMIN (HARUS LOGIN + ROLE ADMIN)
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/users', [AuthController::class, 'userList'])->name('users.index');

    // Dashboard Admin
    Route::get('/', [ahliwariscontroller::class, 'dashboard'])->name('dashboard');

    // Register Ahli Waris
    Route::get('/ahliwaris', [ahliwariscontroller::class, 'index'])->name('ahliwaris.index');

    Route::get('/surat/create', [ahliwariscontroller::class, 'create'])->name('surat.create');
    Route::post('/surat', [ahliwariscontroller::class, 'store'])->name('surat.store');
    Route::get('/surat/{id}', [ahliwariscontroller::class, 'show'])->name('surat.show');
    Route::get('/surat/{id}/edit', [ahliwariscontroller::class, 'edit'])->name('surat.edit');
    Route::put('/surat/{id}', [ahliwariscontroller::class, 'update'])->name('surat.update');
    Route::delete('/surat/{id}', [ahliwariscontroller::class, 'destroy'])->name('surat.destroy');

    // Laporan
    Route::get('/ahliwaris/perbulan', [perbulancontroller::class, 'index'])->name('perbulan.index');
    Route::get('/ahliwaris/pertahun', [pertahuncontroller::class, 'index'])->name('pertahun.index');

    
});
