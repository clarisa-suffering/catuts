<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index(){
        $flights = Flight::get();
        
        return view('listFlight')->with('flights', $flights);
    }

    public function form(Request $request){
        $flight = Flight::findOrFail($request->id);

        return view('booking')->with('flight', $flight);
    }

    public function listTicket(Request $request){
        $flight = Flight::with('ticket')->findOrFail($request->id);

        $tickets = $flight->ticket;

        return view('listTicket')
        ->with('flight', $flight)
        ->with('tickets',$tickets);
    }

}
