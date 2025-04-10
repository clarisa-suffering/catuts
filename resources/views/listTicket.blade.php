@extends('base')
@section('content')
<div class="m-4">
    @if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ session('success') }}
    </div>
    @endif
<div class="relative overflow-x-auto ">
    <div>
    <h1 class="font-semibold">Ticket details for {{$flight->flight_code}}</h1>
    <h1 class="font-semibold">{{$countPassengers}} Passengers & {{$countBoardings}} Boardings</h1>
    <hr>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 m-4">
    <div class="flex items-center">
        <p class="font-semibold text-gray-700 dark:text-gray-400">{{ $flight->origin }}->{{$flight->destination}}</p>
    </div>
    <div class="flex items-center">
        <p class="font-semibold text-gray-700 dark:text-gray-400">Departure {{ \Carbon\Carbon::parse($flight->departure_time)->translatedFormat('l, d F Y H:i') }}</p>
    </div>
    <div class="flex items-center">
        <p class="font-semibold text-gray-700 dark:text-gray-400">Arrival {{ \Carbon\Carbon::parse($flight->arrival_time)->translatedFormat('l, d F Y H:i') }}</p>
    </div>
</div>        
    </div>
    {{-- table --}}
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Passanger name
                </th>
                <th scope="col" class="px-6 py-3">
                    Passanger phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Seat Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Boarding
                </th>
                <th scope="col" class="px-6 py-3">
                    Delete
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $row)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <td class="px-6 py-4">
                    {{$loop->iteration}}
                </td>
                <td class="px-6 py-4">
                    {{$row->passanger_name}}
                </td>
                <td class="px-6 py-4">
                    {{$row->passanger_phone}}
                </td>
                <td class="px-6 py-4">
                    {{$row->seat_number}}
                </td>
                <td class="px-6 py-4">
                    @if ($row->is_boarding)
                    {{$row->boarding_time}}
                    @else
                        <form action="{{ route('board', $row->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirm</button>
                        </form>
                    @endif
                </td>
                <td class="px-6 py-4">
                    @if ($row->is_boarding == 1)
                    <button type="submit" class="text-white bg-blue-200 cursor-not-allowed font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:text-gray-400" disabled>Delete</button>
                    @else
                    <form action="{{ route('delete', $row->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="flight_id" value="{{ $row->flight_id }}">
                        <button type="submit" onclick="return confirm('Hapus data ini?')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection