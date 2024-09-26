<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Ad;
use App\Actions\Getads;

use App\Http\Controllers\AdController;

Route::get('/', function () {
    return view('home');
});



Route::get('/ads', \App\Actions\Getads::class);
Route::get('/ads/{id}', [AdController::class, 'show']);
Route::resource('ads', \App\Http\Controllers\AdController::class);
Route::get('/search', [\App\Http\Controllers\AdController::class, 'find']);

Route::get('/dashboard', function () {
    return view('dashboard');
                                    })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
