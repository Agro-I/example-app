<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="container p-4 bg-dark">
      <form class="row" action="/comments" method="post">
 <label for="form_description">Текст комментария *</label>

  <textarea id="form_description" name="text" class="form-control" placeholder="Введите текст комментария *" rows="4" required="required" data-error="Текст комментария обязательно."></textarea>
<input  type="hidden" name="user_id" id ="user_id" value="1">
<input  type="hidden" name="houses_id" id ="houses_id"value="2">
 @csrf
  <div class="col-md-12">
    <button type="submit" class="btn btn-success btn-send pt-2 btn-block">
        Добавить комментарий
          </button>
          </div>
      </form>
    </div>

</x-app-layout>
