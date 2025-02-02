<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DirectoryController;
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
    Route::post('/File', [FileController::class, 'addFile'])->name('File.add');
    Route::delete('/File', [FileController::class, 'deleteFile'])->name('File.delete');
    Route::post('/File', [FileController::class, 'editFile'])->name('File.edit');
    Route::get('/Download/{filename}', [FileController::class, 'download'])->name('File.download');

    Route::get('/Directory', [DirectoryController::class, 'index'])->name('directory.index');
});

require __DIR__ . '/auth.php';
