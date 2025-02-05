<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/File', [FileController::class, 'index'])->name('File.index');
    Route::post('/File/add', [FileController::class, 'addFile'])->name('File.add');
    Route::get('/File/delete/{id}', [FileController::class, 'deleteFile'])->name('File.delete');
    Route::get('/File/edit/{id}', [FileController::class, 'edit'])->name('File.edit');
    Route::put('/File/update/{id}', [FileController::class, 'update'])->name('File.update');
    Route::get('/Download/{filename}', [FileController::class, 'download'])->name('File.download');

    Route::get('/Directory', [DirectoryController::class, 'index'])->name('directory.index');

    Route::get('/Search/Listings', [SearchController::class, 'autoComplete'])->name('search.autocomplete');
    Route::post('/Search/basicSearch', [SearchController::class, 'basicSearch'])->name('search.search');
});

require __DIR__ . '/auth.php';
