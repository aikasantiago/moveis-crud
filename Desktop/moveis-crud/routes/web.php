<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovelController;
use App\Http\Controllers\FornecedorController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Móveis
Route::get('/movels', [MovelController::class, 'index'])->name('movels.index');
Route::get('/movels/create', [MovelController::class, 'create'])->name('movels.create');
Route::post('/movels', [MovelController::class, 'store'])->name('movels.store');
Route::get('movels/{id}/edit', [MovelController::class, 'edit'])->name('movels.edit');
Route::get('/movels/{movel}', [MovelController::class, 'show'])->name('movels.show');
Route::get('/movels/{movel}/edit', [MovelController::class, 'edit'])->name('movels.edit');
Route::put('/movels/{movel}', [MovelController::class, 'update'])->name('movels.update');
Route::delete('/movels/{movel}', [MovelController::class, 'destroy'])->name('movels.destroy');


// Fornecedor
Route::get('/fornecedors', [FornecedorController::class, 'index'])->name('fornecedors.index');
Route::get('/fornecedors/create', [FornecedorController::class, 'create'])->name('fornecedors.create');
Route::post('/fornecedors', [FornecedorController::class, 'store'])->name('fornecedors.store');
//Route::get('fornecedors/{id}/edit', [FornecedorController::class, 'edit'])->name('fornecedors.edit');
Route::get('/fornecedors/{fornecedor}', [FornecedorController::class, 'show'])->name('fornecedors.show');
Route::get('/fornecedors/{fornecedor}/edit', [FornecedorController::class, 'edit'])->name('fornecedors.edit');
Route::put('/fornecedors/{fornecedor}', [FornecedorController::class, 'update'])->name('fornecedors.update');
Route::delete('/fornecedors/{fornecedor}', [FornecedorController::class, 'destroy'])->name('fornecedors.destroy');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
