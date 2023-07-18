@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppeercase bold">
                Create car
            </h1>
        </div>
    </div>

    <div class="flex justify-center ptt-20w">
        <form action="/cars" method="POST">
            @csrf
            <div class="block">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="name"
                    placeholder="Brand name ...">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="founded"
                    placeholder="Fonded ...">
                <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="description"
                    placeholder="Descriptions ...">
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
