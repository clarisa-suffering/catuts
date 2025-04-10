<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function insert(Request $request){
        $request->validate([
            'id' => 'required|exists:flights,id',
            'passanger_name' => 'required|string',
            'passanger_phone' => 'required|string|max:14',
            'seat_number' => 'required|string|max:3',
        ]);

        $ticket = new Ticket;
        $ticket->flight_id = $request->id;
        $ticket->passanger_name = $request->passanger_name;
        $ticket->passanger_phone = $request->passanger_phone;
        $ticket->seat_number = $request->seat_number;
        $ticket->save();

        return redirect()->route('listFlight')->with('success', 'Tiket berhasil dipesan!');
    }

    public function board(Request $request){
        $ticket = Ticket::findOrFail($request->id);
        $ticket->is_boarding = 1;
        $ticket->boarding_time = Carbon::now();
        $ticket->save();

        return redirect()->route('listTicket');
    }

    public function delete(Request $request){
        $ticket = Ticket::findOrFail($request->id);
        $ticket->delete();

        return redirect()->route('listTicket', $request->flight_id)->with('success', 'Tiket berhasil dibatalkan!');
    }
}
