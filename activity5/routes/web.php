<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;

Route::get('/', function () {
    return view('welcome');
});

//ginawa kong parameters yung operand at operator para kapag
//kunware divide yung operator  tapos yung num1 at num2 ay ibang numbers,
// makukuha ni laravel  yung numbers  at operators para hindi mag error
Route::get('/{operation1}/{num1}/{num2}/{operation2}/{num3}/{num4}', 
    [CalculatorController::class, 'calculateResults']);