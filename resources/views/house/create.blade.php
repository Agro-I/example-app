<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="container p-4 bg-dark">
        <form action="/houses" method="post" >


            <input class="form-control" type="file" name="emblem" id="emblem" placeholder="добавьте герб"><br>

            <input class="form-control" type="text" name="name"  id="name"placeholder="название" ><br>
            @error('name') <p style="color:red">{{ $message }}</p>@enderror

            <input class="form-control" type="text" name="ancestral_fortress"  id="ancestral_fortress" placeholder="родовая крепость"><br>
            @error('ancestral_fortress') <p style="color:red">{{ $message }}</p>@enderror

            <input class="form-control" type="text" name="slogan" id="slogan" placeholder="девиз"><br>
            @error('slogan') <p style="color:red">{{ $message }}</p>@enderror

            <input class="form-control" type="number" name="quantity_of_characters"  id="quantity_of_characters" placeholder="кол-во персонажей"><br>
            @error('quantity_of_characters') <p style="color:red">{{ $message }}</p>@enderror
            <input class="form-control" type="number" name="quantity_of_live_characters"  id="quantity_of_live_characters" placeholder="кол-во живых персонажей"><br>
            @error('quantity_of_live_characters') <p style="color:red">{{ $message }}</p>@enderror
            @csrf
            <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-send pt-2 btn-block">
                   добавить
                </button>
            </div>
        </form>
        <br>
    </div>

</x-app-layout>
