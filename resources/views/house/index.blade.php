<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ml-8 mr-8">
        @forelse($house as $house)
            <div class="m-3 text-center shadow mt-5 mx-auto d-block">
                <a class="fs-5 text-decoration-none text-warning" href="/houses/{{$house->id }}">{{ $house->name }}</a> <br>
                <div class="p-4">
                    <img class="rounded-circle  mx-auto d-block " alt="image" src="{{'/images/'.$house->emblem}}">
                </div>
                <div class="text-left">
                    Родовая крепость: {{ $house->ancestral_fortress }} <br>
                    Девиз: {{ $house->slogan }} <br>
                    Кол-во персонажей: {{ $house->quantity_of_characters }} <br>
                    @can('house_update', [$house])
                        <a class="btn btn-secondary m-3 p-1 fs-6 btn-danger" href="/houses/{{ $house->id }}/edit">Редактировать</a>
                    @endcan
                </div>
            </div>
        @empty
            <strong>Нет домов</strong>
    @endforelse
    </x-app-layout>
