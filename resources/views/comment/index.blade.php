<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <section class="wrapper">
    <div class="container">
      <h1>Комментарии к {{ $house->name }}</h1>
      <h3>Автор: {{ $house->user->name }}</h3>
      <hr>
        @foreach ($comments as $comment)
            <div class="comment">
                <div class="head">
                    <h5><strong class='user'>{{ $comment->user->name }}</strong>@if (Auth::user()->followed->where('id', '=', $comment->user->id)->count())<i class="fas fa-user-friends"></i>@endif</h5>
                </div>
                <h6 class="ml-2">{{ $comment->text }}</h6>
            </div>
            <hr>
            {{-- <div class="card p-3 h-25">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center"> <span><small class="font-weight-bold text-primary">{{ $comment->user->name }}</small> <small class="font-weight-bold">{{ $comment->text }}</small></span> </div>
                </div>
            </div> --}}
        @endforeach
    <form style="display:inline;" action="/comments/create" method="get">
        @csrf
        <input type="hidden" value="{{ Auth::user()->id }}" name="user"/>
        <input type="hidden" value="{{ $house->id }}" name="release"/>
        <button class="btn btn-primary">Добавить комментарий</button>
    </form>
    </div>
</x-app-layout>
