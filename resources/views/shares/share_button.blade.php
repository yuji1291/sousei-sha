@if (Auth::user()->is_shares($task->id))
        {!! Form::open(['route' => ['shares.unshare', $task->id], 'method' => 'delete']) !!}
            {!! Form::submit('タスク共有を解除する', ['class' => "btn btn-warning btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['shares.share', $task->id]]) !!}
            {!! Form::submit('タスクを共有する', ['class' => "btn btn-success btn-block"]) !!}
        {!! Form::close() !!}
    @endif