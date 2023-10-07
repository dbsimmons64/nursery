<?php

use App\Http\Controllers\Admin\AdminNurseryController;
use App\Http\Controllers\NurseryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/nurseries', [NurseryController::class, 'index'])->name('nursery.index');
    Route::get('/nurseries/{id}', [NurseryController::class, 'show'])->name('nursery.show');
    Route::delete('/nurseries/{nursery}', [NurseryController::class, 'destroy'])->name('nursery.destroy');

});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:super'])->group(function () {
    Route::get('/nurseries', [AdminNurseryController::class, 'index'])->name('nursery.index');
    Route::get('/nurseries/{id}', [AdminNurseryController::class, 'show'])->name('nursery.show');
    Route::delete('/nurseries/{id}', [AdminNurseryController::class, 'destroy'])->name('nursery.destroy');
});

require __DIR__.'/auth.php';
