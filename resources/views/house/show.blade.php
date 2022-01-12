@extends('app')
@section('title','House')
@section('h1','House')
@section('content')

    <div class="text-center d-flex bg-dark">

        <div class="mx-auto text-warning p-3 text-sm fs-4 leading-tight">
            <hr>
            <div class=" fs-6 w-75 mx-auto "  >
                <p> Название дома:   {{ $house->name }}</p>
                <p> Родовая крепость:   {{$house->ancestral_fortress}}</p>
                <p> Девиз:   {{$house->slogan}}</p>
                <p> Кол-во персонажей:   {{ $house->quantity_of_characters }}</p>
            </div>
            <div>
                    <a href="/houses/{{ $house->id }}/edit" class="text-decoration-none text-gray-300">Редактировать</a>
            </div>
            <hr>
            <br>
        </div>
        <div class="w-50 pr-5 mx-auto">
            <img class="rounded w-100" alt="image" src="{{'/images/'.$house->emblem}}">
        </div>
        <hr>
        <form action="/houses/{{ $house->id }}" method="post">
            @method('DELETE')
            @csrf
                <button  class="w-50 mt-3 p-1 btn btn-secondary">Удалить</button>
        </form>
        <br>

@endsection
