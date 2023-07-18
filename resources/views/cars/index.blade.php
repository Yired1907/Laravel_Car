@extends('layouts.app')

@foreach ($cars as $car)
    {{-- {{ $car['name'] }} --}}
    {{ $car->name }}
@endforeach

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase blod">Car</h1>
        </div>

        <div class="pt-10">
            <a href="cars/create" class="boder-b-2 pb-2 boder-dotted text-gray-500">
                Add a new car &rarr;
            </a>
        </div>

        <div class="w-5/6 py-10">
            @foreach ($cars as $car)
                <div class="m-auto">
                    <div class="float-right">
                        <a class="boder-b-2 pb-2 boder-dotted text-green-500" href="cars/{{ $car->id }}/edit">>
                            Edit &rarr;
                        </a>

                        <form action="/cars/{{ $car->id }}" class="pt-3" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="boder-b-2 pb-2 boder-dotted text-red-500">
                                Delete &rarr;
                            </button>
                        </form>

                    </div>
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Founded: {{ $car->founded }}
                    </span>
                    <h2 class="text-gray-700 text-5xl  hover:text-gray-500">
                        <a href="cars/{{ $car->id }}">
                            {{ $car->name }}</a>
                    </h2>

                    <p class="text-lg text-gray-700">
                        {{ $car->description }}
                    </p>

                    <hr class="mt-4 mb-8">
            @endforeach
        </div>
    </div>

    </div>
@endsection
