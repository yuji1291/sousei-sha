@extends('layouts.app')

@section('content')
    <h1>「{{ $task->title }} 」のタスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>ユーザーネーム</th>
            <td>{{ $task->user->name }}</td>
        </tr>
        <tr>
            <th>タイトル</th>
            <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <th>開始時刻</th>
             <td>{{ $task->start_date }} {{ substr($task->start_time, 0, 5) }}</td>
        </tr>
        <tr>
            <th>終了時刻</th>
             <td>{{ $task->end_date }} {{ substr($task->end_time, 0, 5) }}</td>
        </tr>
        <tr>
            <th>場所</th>
            <td>{{ $task->place }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
    <div class="d-flex justify-content-start">
    {!! link_to_route('users.show', 'このユーザーのカレンダー', ['id' =>$task->user_id], ['class' => 'btn btn-info']) !!}

    @if (Auth::id() == $task->user_id)
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-light']) !!}
    
     {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    @else
    @include('shares.share_button' ,['task' => $task])
    @endif
    </div>
@endsection