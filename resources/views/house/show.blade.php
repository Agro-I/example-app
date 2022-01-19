<x-app-layout>
    <x-slot name="header">
    </x-slot>
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
                <form style="display:inline;" action="/houses/{{ $house->id }}/comments" method="get">
                    @csrf

                    <button type="submit" class="btn btn-light">Комментарии</button>
                </form>
            </div>
            <div>
                @can('house_update', [$house])
                    <a href="/houses/{{ $house->id }}/edit" class="text-decoration-none text-gray-300">Редактировать</a>
                @endcan
            </div>
            <hr>
            <br>
        </div>
        <div class="w-50 pr-5 mx-auto text-center" >
            <img class="mx-auto d-block" alt="image" src="{{'/images/'.$house->emblem}}">
        </div>
        <hr>
        <form action="/houses/{{ $house->id }}" method="post">
            @method('DELETE')
            @csrf
            <div>
                @can('house_update', [$house])
                    <button  class="w-50 mt-3 p-1 btn btn-secondary">Удалить</button>
                @endcan
            </div>
        </form>
        <form action="/houses/{{ $house->id }}/forceDelete" method="post">
        <div>
            @method('DELETE')
            @csrf
            @can('force_delete', [$house])
                <button  class="w-50 mt-3 p-1 btn btn-secondary">Удалить Навсегда</button>
            @endcan
        </div>
        </form>
        <br>
    </div>
</x-app-layout>
