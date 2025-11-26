<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ahliwariscontroller;
use App\Http\Controllers\perbulancontroller;
use App\Http\Controllers\pertahuncontroller;

Route::get('/', [ahliwariscontroller::class, 'index'])->name('dashboard');


Route::get('/surat/create', [ahliwariscontroller::class, 'create'])->name('surat.create');
Route::post('/surat', [ahliwariscontroller::class, 'store'])->name('surat.store');
Route::get('/surat/{id}', [ahliwariscontroller::class, 'show'])->name('surat.show');
Route::get('/surat/{id}/edit', [ahliwariscontroller::class, 'edit'])->name('surat.edit');
Route::put('/surat/{id}', [ahliwariscontroller::class, 'update'])->name('surat.update');
Route::delete('/surat/{id}', [ahliwariscontroller::class, 'destroy'])->name('surat.destroy');



Route::get('/ahliwaris/perbulan', [perbulancontroller::class, 'index'])->name('perbulan.index');
Route::get('/ahliwaris/pertahun', [pertahunController::class, 'index'])->name('pertahun.index');
