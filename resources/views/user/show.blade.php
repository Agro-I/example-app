<x-app-layout>
    <x-slot name="header">
    </x-slot>
  <section class="wrapper">
    <div class="container">
      @if (Auth::user()->id == $user->id)
        <h1>Список ваших выпусков Grand Tour</h1>
      @else
        <h1>Список выпусков пользователя {{ $user->name }}</h1>
      @endif
      <div class="row">
        @can('add-grand-tour', $user->id)
          <div class="col-md-4 padding-top-bottom-15">
            <div class="card hoverable text-white card-has-bg click-col">
              <div class="card-img-overlay d-flex flex-column">
                <i class="fas fa-plus plus-center"></i>
                <form style="display:inline;" action="/grand_tour/create" method="get">
                  @csrf
                  <input type="hidden" value="{{ $user->id }}" name="user"/>
                  <button style="color: transparent; background-color: transparent; border: none;"  class="stretched-link"></button>
                </form>
              </div>
            </div>
          </div>
        @endcan
        @forelse ($releases as $release)
          @include('grand_tour.show', ['grandTourRelease' => $release])
          <div class="col-md-4 padding-top-bottom-15">
            <div class="card hoverable text-white card-has-bg click-col" style="background-image:url({{ asset($release->photo_url) }});">
              <div class="card-img-overlay d-flex flex-column">
                <div class="card-body">
                  <a data-toggle="modal" data-target="#releaseModal{{ $release->id }}" class="stretched-link"></button>
                  <h4 class="card-title mt-0 "><a class="text-white">{{ $release->name }}</a></h4>
                  <small><i class="far fa-clock"></i><b> {{ $release->release_date }}</b></small>
                </div>
              </div>
            </div>
          </div>
        @empty
          @cannot('add-grand-tour', $user->id)
            <span>Не найдено выпусков Grand Tour</span>
          @endcannot
        @endforelse
      </div>
      @if (Auth::user()->id == $user->id)
        <h1>Список выпусков пользователей, на которых вы подписаны</h1>
        <div class="row">
          @forelse ($followed_releases as $release)
            @include('grand_tour.show', ['grandTourRelease' => $release])
            <div class="col-md-4 padding-top-bottom-15">
              <div class="card hoverable text-white card-has-bg click-col" style="background-image:url({{ asset($release->photo_url) }});">
                <div class="card-img-overlay d-flex flex-column">
                  <div class="card-body">
                    <a data-toggle="modal" data-target="#releaseModal{{ $release->id }}" class="stretched-link"></button>
                    <h4 class="card-title mt-0 "><a class="text-white">{{ $release->name }}</a></h4>
                    <small><i class="far fa-clock"></i><b> {{ $release->release_date }}</b></small>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <span>Выпусков не обнаружено, либо вы ещё не подписались ни на кого</span>
          @endforelse
        </div>
      @endif
      @can('restore-or-full-delete-grand-tour')
      <h1>Список удаленных выпусков Grand Tour</h1>
      <div class="row">
        @forelse ($deleted_releases as $release)
          @include('grand_tour.show', ['grandTourRelease' => $release])
          <div class="col-md-4 padding-top-bottom-15">
            <div class="card hoverable text-white card-has-bg click-col" style="background-image:url({{ asset($release->photo_url) }});">
              <div class="card-img-overlay d-flex flex-column">
                <div class="card-body">
                  <form action="/grand_tour/{{ $release->id }}/restore" method="POST">
                    @csrf
                    <button style="color: transparent; background-color: transparent; border: none;" class="stretched-link"></button>
                  </form>
                  <h4 class="card-title mt-0 "><a class="text-white">{{ $release->name }}</a></h4>
                  <small><i class="far fa-clock"></i><b> {{ $release->release_date }}</b></small>
                </div>
              </div>
            </div>
          </div>
      </div>
      @empty
        <b>Не найдено удаленных выпусков Grand Tour</b>
      @endforelse
      @endcan
    </div>
  </section>
  </x-app-layout>
