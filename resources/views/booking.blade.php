@extends('base')
@section('content')
<div>
<form class="m-4" action="{{ route('book') }}" method="POST">
    @csrf
    {{-- error alert, hrs di bwh csrf --}}
    @if ($errors->any())
    <div class="mb-4 p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <strong class="font-medium">Error!</strong> Ada kesalahan saat mengisi form:
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- inline label --}}
    <div class="mb-5 flex items-center gap-4">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" name="passanger_name" id="name" value="{{ old('passanger_name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
    {{-- g inline --}}
    <div class="mb-5">
      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
      <input type="tel" name="passanger_phone" value="{{ old('passanger_phone') }}" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
    <div class="mb-5">
        <label for="seat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seat Number</label>
        <input type="text" name="seat_number" value="{{ old('seat_number') }}" id="seat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
      </div>
    {{-- button --}}
    <div class="flex justify-end gap-2">
    <a href="{{ url('/flights') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
        Cancel
    </a>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Book Ticket</button>
    <input type="hidden" name="id" value="{{ $flight->id }}">
    </div>
    </form>  
</div>
@endsection