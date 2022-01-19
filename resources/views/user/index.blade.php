<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <section class="wrapper">
    <div class="container">
      <div class="d-flex">
        <h1>Вы вошли как {{ Auth::user()->name }}</h1>
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-button :href="route('logout')" class="btn btn-danger ml-2"
                  onclick="event.preventDefault();
                              this.closest('form').submit();">
              Выйти
          </x-button>
        </form>
      </div>
      <a href="/users/{{ Auth::user()->name }}" type="button" class="w-25 btn btn-primary mt-1 bd-highlight p-2">Ваша лента</a><br>
      <h1>Авторы, на которых вы подписаны</h1>
      <div style="width: 70%;">
        <div class="d-flex flex-sm-column bd-highlight mb-3">
          @forelse (Auth::user()->followed as $user)
            <div class="d-flex justify-content-left">
            <a href="/users/{{ $user->name }}" type="button" class="w-25 btn btn-primary mt-1 bd-highlight p-2">{{ $user->name }}</a><br>
            <a href="/users/{{ $user->id }}/unfollow" type="button" class="w-25 btn btn-secondary mt-1 ml-2 bd-highlight p-2">Отписаться</a><br>
            </div>
          @empty
            <span>Вы ни на кого не подписаны</span>
          @endforelse
        </div>
      </div>
      <h1>Авторы, на которых вы не подписаны</h1>
      <div style="width: 70%;">
        <div class="d-flex flex-sm-column bd-highlight mb-3">
          @forelse ($not_followed as $user)
            <div class="d-flex justify-content-left">
            <a href="/users/{{ $user->name }}" type="button" class="w-25 btn btn-primary mt-1 bd-highlight p-2">{{ $user->name }}</a><br>
            <a href="/users/{{ $user->id }}/follow" type="button" class="w-25 btn btn-info mt-1 ml-2 bd-highlight p-2">Подписаться</a><br>
            <a href="/users/{{ $user->id }}/followMutually" type="button" class="w-25 btn btn-success mt-1 ml-1 bd-highlight p-2">Взаимная подписка</a><br>
            </div>
          @empty
            <span>Отсутствуют</span>
          @endforelse
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
