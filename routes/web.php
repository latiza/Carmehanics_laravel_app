<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;

/*Route::get('/', function () {
    return view('welcome');
});*/
//2 feladat
Route::get('/', function () { return "<h1>Üdvözlünk az Autószerelő Műhely nyilvántartási rendszerében!</h1>"; });

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

//felvitel
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
//mentés

Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
//összes autó

Route::get('/cars/{plate}', [CarController::class, 'show'])->name('cars.show');


Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
