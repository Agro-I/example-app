@extends('app')
@section('title','Houses')
@section('h1','Дома Игры престолов')
@section('content')
    <ul>

        <li><a href="/houses/create" >Добавить дом</a></li>

    </ul>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ml-8 mr-8">
        @forelse($house as $house)
            <div class="m-3 text-center shadow mt-5 ">
                <a class="fs-5 text-decoration-none text-gray-300" href="/houses/{{$house->id }}">{{ $house->name }}</a> <br>
                <div class="p-4">
                    <img class="rounded-circle " alt="image" src="{{'/images/'.$house->emblem}}">
                </div>
                <div class="text-center text-gray-100">
                    Родовая крепость: {{ $house->ancestral_fortress }} <br>
                    Девиз: {{ $house->slogan }} <br>
                    Кол-во персонажей: {{ $house->quantity_of_characters }} <br>

                </div>
            </div>
        @empty
            <strong>Нет домов</strong>
    @endforelse
@endsection
