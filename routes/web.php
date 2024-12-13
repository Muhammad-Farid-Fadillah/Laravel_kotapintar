<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get('/news/cetak', [NewsController::class, 'cetak'])->name('news.cetak');

Route::get('news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::resource('news', NewsController::class);

Route::resource('news', NewsController::class);

Route::prefix('admin')->group(function () {
    Route::resource('news', NewsController::class);
});

// Route untuk menampilkan daftar berita
Route::get('/news', [NewsController::class, 'index']);

// Route untuk menampilkan form tambah berita
Route::get('/news/create', [NewsController::class, 'create']);

// Route untuk menyimpan berita baru
Route::post('/news', [NewsController::class, 'store']);

Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');

// Route untuk memperbarui berita
Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');

// Route untuk menghapus berita
Route::delete('/news/{id}', [NewsController::class, 'destroy']);

Route::resource('news', NewsController::class);

Route::get('/', function () {
    return view('welcome');
});
