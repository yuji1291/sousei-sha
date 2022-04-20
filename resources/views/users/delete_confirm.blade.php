@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-sm-2">
            <i class="fas fa-exclamation-triangle fa-9x"></i>
        </div>
        <div class="col-sm-10">
            <div class="text-center mb-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <p>アカウントを削除すると、ログインができなくなり、登録した文も全て削除されます。</p>
                    <p>本当に削除してよろしいですか？</p>
                    {!! Form::open(['route' => ['users.destroy', Auth::user()->id], 'method' => 'delete']) !!}
                    <div class="d-flex justify-content-around">
                    {!! Form::submit('削除する', ['class' => 'btn btn-danger']) !!}
                    <input value="前に戻る" onclick="history.back();" type="button">
                    </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection