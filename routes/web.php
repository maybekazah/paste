<?php

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

Route::get('/', [\App\Http\Controllers\PasteController::class, 'index'])->name('pastes.index');
Route::get('pastes/{paste}', [\App\Http\Controllers\PasteController::class, 'show'])->name('pastes.show');
Route::get('pastes/create', [\App\Http\Controllers\PasteController::class, 'create'])->name('pastes.create');
Route::post('pastes', [\App\Http\Controllers\PasteController::class, 'store'])->name('pastes.store');

Route::middleware('guest')->group(function () {
    Route::get('register', [\App\Http\Controllers\UserController::class, 'registerForm'])->name('register');
    Route::post('register_process', [\App\Http\Controllers\UserController::class, 'registerProcess'])->name('register_process');
    Route::get('login', [\App\Http\Controllers\UserController::class, 'loginForm'])->name('login');
    Route::post('login_process', [\App\Http\Controllers\UserController::class, 'loginProcess'])->name('login_process');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::get('my_pastes', [\App\Http\Controllers\PasteController::class, 'myPastes'])->name('my_pastes');
});
