     @if (Auth::id() == $user->id)
     {!! link_to_route('tasks.create', '新規タスクの作成', [], ['class' => 'btn btn-primary']) !!}
     @endif
      <div id='calendar-view'></div>
    @include('tasks.calendar')
