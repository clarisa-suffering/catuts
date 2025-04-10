<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Flight extends Model
{
    protected $table = 'flights';

    protected $fillable = ['flight_code', 'origin', 'destination', 'departure_time', 'arrival_time'];

    public function ticket():HasMany{
        return $this->HasMany(Ticket::class, 'flight_id', 'id');
    }

}
