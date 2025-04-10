<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/flights', [FlightController::class,'index'])->name('listFlight');
Route::get('/flights/ticket/{id}', [FlightController::class,'listTicket'])->name('listTicket');
Route::get('/flights/book/{id}', [FlightController::class,'form'])->name('formTicket');
Route::post('/ticket/submit', [TicketController::class,'insert'])->name('book');
Route::put('/ticket/board/{id}', [TicketController::class,'board'])->name('board');
Route::post('/ticket/delete/{id}', [TicketController::class,'delete'])->name('delete');
