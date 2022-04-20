@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-2">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-10">
           @if (count($shares) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">ユーザー</th>
                    <th class="text-center">開始時刻</th>
                    <th class="text-center">タイトル</th>
                    <th class="text-center">タスク共有設定</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shares as $share)
                <tr>
                    <td class="text-center">{{ $share->user->name }}</td>
                    <td class="text-center">{{ $share->start_date }} {{ $share->start_time }}</td>
                    <td class="text-center">{!! link_to_route('tasks.show', $share->title , ['id' => $share->id]) !!}</td>
                    <td class="text-center">
                        @if (Auth::user()->is_shares($share->id))
                            {!! Form::open(['route' => ['shares.unshare', $share->id], 'method' => 'delete']) !!}
                            {!! Form::submit('タスク共有を解除する', ['class' => "btn btn-warning btn-sm"]) !!}
                            {!! Form::close() !!}
                            @else
                            {!! Form::open(['route' => ['shares.share', $share->id]]) !!}
                            {!! Form::submit('タスクを共有する', ['class' => "btn btn-success btn-sm"]) !!}
                            {!! Form::close() !!}
                        @endif</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
        </div>
    </div>
@endsection