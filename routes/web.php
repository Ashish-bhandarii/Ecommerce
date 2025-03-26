<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/categories', CategoryController::class);

    // Route::get('/categories', CategoryController::class)->name('categories.index');
    // Route::post('/categories', CategoryController::class)->name('categories.store');
    // Route::put('/categories', CategoryController::class)->name('categories.edit');
    // Route::delete('/categories', CategoryController::class)->name('categories.destroy');
   
});

require __DIR__.'/auth.php';
