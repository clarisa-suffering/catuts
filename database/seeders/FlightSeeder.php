<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert([
            [
                'flight_code'=>'JT610',
                'origin'=>'SBY',
                'destination'=>'JKT',
                'departure_time'  => '2025-04-15 08:30:00',
                'arrival_time'    => '2025-04-15 10:45:00'
            ],
            [
                'flight_code'=>'JT320',
                'origin'=>'MLG',
                'destination'=>'ACH',
                'departure_time'  => '2025-04-15 09:50:00',
                'arrival_time'    => '2025-04-15 10:20:00'
            ],
            [
                'flight_code'=>'JT670',
                'origin'=>'PBN',
                'destination'=>'KMN',
                'departure_time'  => '2025-04-15 10:35:00',
                'arrival_time'    => '2025-04-15 12:55:00'
            ],
            [
                'flight_code'=>'JT880',
                'origin'=>'SKT',
                'destination'=>'KAL',
                'departure_time'  => '2025-04-15 10:45:00',
                'arrival_time'    => '2025-04-15 13:50:00'
            ],
            [
                'flight_code'=>'JT440',
                'origin'=>'SMG',
                'destination'=>'JOG',
                'departure_time'  => '2025-04-15 11:25:00',
                'arrival_time'    => '2025-04-15 12:45:00'
            ],
            [
                'flight_code'=>'JT240',
                'origin'=>'BNW',
                'destination'=>'DPS',
                'departure_time'  => '2025-04-15 12:10:00',
                'arrival_time'    => '2025-04-15 14:10:00'
            ],
        ]);
    }
}
