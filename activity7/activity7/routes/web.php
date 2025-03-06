<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('forms', [FormController::class, 'showForm'])->name('forms');
Route::post('forms',[FormController::class, 'handleForm']);