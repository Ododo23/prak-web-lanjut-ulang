<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

// MODUL 2: Profil Mahasiswa (Statik Dinamis)
Route::get('/profile/{nama}/{kelas}/{npm}', [ProfileController::class, 'profile'])->name('profile.show');

// MODUL 3: Form Input
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

// MODUL 5: Tampilkan daftar user
Route::get('/user', [UserController::class, 'index'])->name('user.index');

// MODUL 6: Edit dan Update
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
