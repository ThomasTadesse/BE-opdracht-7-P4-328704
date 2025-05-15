<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstructeurController;
use App\Http\Controllers\VoertuigController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home');
})->name('home');

// resource instructeur
Route::get('/instructeur', [InstructeurController::class, 'index'])->name('instructeur.index');
Route::get('/instructeur/create', [InstructeurController::class, 'create'])->name('instructeur.create');
Route::post('/instructeur', [InstructeurController::class, 'store'])->name('instructeur.store');
Route::get('/instructeur/{instructeur}', [InstructeurController::class, 'show'])->name('instructeur.show');
Route::get('/instructeur/{instructeur}/edit', [InstructeurController::class, 'edit'])->name('instructeur.edit');
Route::put('/instructeur/{instructeur}', [InstructeurController::class, 'update'])->name('instructeur.update');
Route::delete('/instructeur/{instructeur}', [InstructeurController::class, 'destroy'])->name('instructeur.destroy');

// resource voertuig
Route::get('/voertuig', [VoertuigController::class, 'index'])->name('voertuig.index');
Route::get('/voertuig/create', [VoertuigController::class, 'create'])->name('voertuig.create');
Route::post('/voertuig', [VoertuigController::class, 'store'])->name('voertuig.store');
Route::get('/voertuig/{voertuig}', [VoertuigController::class, 'show'])->name('voertuig.show');
Route::get('/voertuig/{voertuig}/edit', [VoertuigController::class, 'edit'])->name('voertuig.edit');
Route::put('/voertuig/{voertuig}', [VoertuigController::class, 'update'])->name('voertuig.update');
Route::delete('/voertuig/{voertuig}', [VoertuigController::class, 'destroy'])->name('voertuig.destroy');