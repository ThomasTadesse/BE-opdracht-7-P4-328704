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
Route::resource('instructeur', InstructeurController::class)
    ->parameters(['instructeur' => 'instructeur'])
    ->names([
        'index' => 'instructeur.index',
        'create' => 'instructeur.create',
        'store' => 'instructeur.store',
        'show' => 'instructeur.show',
        'edit' => 'instructeur.edit',
        'update' => 'instructeur.update',
        'destroy' => 'instructeur.destroy'
    ]);
// resource voertuig
Route::resource('voertuig', VoertuigController::class)
    ->parameters(['voertuig' => 'voertuig'])
    ->names([
        'index' => 'voertuig.index',
        'create' => 'voertuig.create',
        'store' => 'voertuig.store',
        'show' => 'voertuig.show',
        'edit' => 'voertuig.edit',
        'update' => 'voertuig.update',
        'destroy' => 'voertuig.destroy'
    ]);
