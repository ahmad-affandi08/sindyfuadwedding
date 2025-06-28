<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UndanganController;

// Redirect halaman utama ke contoh undangan
Route::get('/', function () {
    return redirect('/Tamu Undangan');
});

// Route untuk menampilkan undangan dengan nama tamu dinamis
Route::get('/{namaTamu}', [UndanganController::class, 'show'])->name('undangan.show');

// Route untuk menyimpan data RSVP
Route::post('/rsvp', [UndanganController::class, 'storeRsvp'])->name('rsvp.store');
