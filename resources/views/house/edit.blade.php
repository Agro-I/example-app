<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="p-4 d-flex mw-auto">

        <div class="m-5">
            <form action="/houses/{{ $house->id }}" method="post" >
                @method('PATCH')
                @csrf
                <input class="form-control" type="file" name="emblem"  value="{{'/images/'.$house->emblem}}" id="emblem" ><br>
                <input class="form-control" type="text" name="name" value="{{$house->name}}" id="name" ><br>
                @error('name') <p style="color:red">{{ $message }}</p>@enderror
                <input class="form-control" type="text" name="ancestral_fortress" value="{{$house->ancestral_fortress}}" id="ancestral_fortress" ><br>
                @error('ancestral_fortress') <p style="color:red">{{ $message }}</p>@enderror
                <input class="form-control" type="text" name="slogan" value="{{$house->slogan}}" id="slogan" ><br>
                @error('slogan') <p style="color:red">{{ $message }}</p>@enderror
                <input class="form-control" type="number" name="quantity_of_characters" value="{{$house->quantity_of_characters}}" id="quantity_of_characters"><br>
                @error('quantity_of_characters') <p style="color:red">{{ $message }}</p>@enderror

                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-send pt-2 btn-block">
                        Редактировать дом
                    </button>
                </div>
            </form>
        </div>

        <br>
        <div class="p-4 pl-6 w-50">
            <img class="rounded  w-100" src="{{'/images/'.$house->emblem}}">
        </div>
    </div>

</x-app-layout>
