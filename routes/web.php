<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return "I am coming for you ! Mr. Docker ";

});

Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/test',[testController::class,'index'])->name('test.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
