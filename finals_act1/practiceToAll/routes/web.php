<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
Route::get('/', function () {
    return view('welcome');
});




Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [RegisterController::class, 'loginForm'])->name('login');
Route::post('login', [RegisterController::class, 'login']);
Route::post('logout', [RegisterController::class, 'logout']);
Route::middleware('auth')->get('dashboard', [RegisterController::class, 'dashboard'])->name('dashboard');