<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ticketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('account', [ticketController::class, 'account'])->name('account');
Route::post('account', [ticketController::class , 'createUserAccount']);
Route::get('login', [ticketController::class, 'login'])->name('login');
Route::post('login', [ticketController::class, 'loginCredentials']);
Route::get('login1', [ticketController::class, 'login1'])->name('login1');

Route::post('login1', [ticketController::class, 'agentLogin']);

Route::get('agentLog', function(){
    return view("agentLogin");
});
Route::get('tickets', function(){
    return View('tickets');
});

Route::get('/tickets', [ticketController::class, 'index']);

Route::get('delete/{id}', [ticketController::class, 'removeTickets']);
Route::get('delete1/{id}', [ticketController::class, 'removeTickets1']);
Route::get('insertForm', [ticketController::class, 'createForm'])->name('insertForm');
Route::get('iforms', [ticketController::class, 'iforms']);
Route::get('userResolved', [ticketController::class, 'userResolved']);
Route::get('userAccepted', [ticketController::class, 'userAccepted']);
Route::get('userClosed', [ticketController::class, 'userClosed']);

Route::get('agentResolved', [ticketController::class, 'agentResolved']);
Route::get('agentAccepted', [ticketController::class, 'agentAccepted']);
Route::get('agentClosed', [ticketController::class, 'agentClosed']);
Route::get('iforms1', [ticketController::class, 'iforms1']);
Route::post('insertForm', [ticketController::class, 'createTicket']);
Route::get('accept/{id}', [ticketController::class, 'accept']);
Route::post('accept/{id}', [ticketController::class, 'acceptInsert']);
Route::get('view/{id}', [ticketController::class, 'view']);

Route::get('view1/{id}', [ticketController::class, 'view1']);
Route::get('update/{id}', [ticketController::class, 'viewEditTicket']);
Route::post('update/{tid}', [ticketController::class, 'updateTickets']);
Route::get('update1/{id}', [ticketController::class, 'viewAgentTickets']);
Route::post('update1/{tid}', [ticketController::class, 'updateTickets1']);

Route::get('/logout', function () {
    Auth::logout();
    session()->flush();
    return redirect('/login')->with('success', 'Logged out successfully.');
})->name('logout');