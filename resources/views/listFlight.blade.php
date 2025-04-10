@extends('base')
@section('content')
<div class="m-4">
    {{-- alert sukses --}}
    @if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {{-- card --}}
        @foreach ($flights as $row)
        <div class="mx-auto">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                {{-- kode n origin dest --}}
                <div class="flex justify-between">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$row->flight_code}}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$row->origin}} -> {{$row->destination}}</p>
                </div>
                {{-- departure arrival --}}
                <p class="mb-3 justify-start font-normal text-gray-700 dark:text-gray-400">Departure</p>
                <p class="mb-3 justify-start font-normal text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($row->departure_time)->translatedFormat('l, d F Y H:i') }}</p>
                <p class="mb-3 justify-start font-normal text-gray-700 dark:text-gray-400">Arrival</p>
                <p class="mb-3 justify-start font-normal text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($row->arrival_time)->translatedFormat('l, d F Y H:i') }}</p>
                {{-- button 2 horizontal --}}
                <div class="flex flex-wrap gap-2 justify-center">
                <a href="{{route('formTicket' , $row->id)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Book Ticket
                </a>
                <a href="{{ route('listTicket' , $row->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    View Details
                </a>
                </div>
            </div> 
        </div>
        @endforeach
    </div>
</div>
@endsection