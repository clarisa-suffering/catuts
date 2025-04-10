<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = ['flight_id', 'passanger_name', 'passanger_phone', 'seat_number'];

    public function flight(){
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }
}
