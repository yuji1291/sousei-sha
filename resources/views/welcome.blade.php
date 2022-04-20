@extends('layouts.app')

@section('content')
     @if (Auth::check())
     <div class="row">
        <aside class="col-sm-2">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-10">
       @include('tasks.index',['tasks' => $tasks])
       </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>ようこそ、Connect ver1.01へ</h1>
            <div class="row">
                <div class="col-sm-6 offset-sm-3 mt-5">
                     {!! Form::open(['route' => 'login.post']) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'メールアドレス') !!}
                            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                        </div>
                    <div class="form-group">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                        {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
    <div class="row pt-5">
        <div class="col-sm-7 offset-sm-3">
            <table class="table table-bordered tabele-sm">
              <thead class="thead-light">
                    <tr>
                      <th scope="col"><i class="fas fa-info-circle"></i>更新履歴</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
              </thead>
              <tbody>
                    <tr>
                      <td scope="row">2020年3月2日</td>
                      <td>ver1.01</td>
                      <td>イベント入力時の時間入力方法を変更</td>
                    </tr>
                    <tr>
                      <td scope="row">2020年2月22日</td>
                      <td>ver1.00</td>
                      <td>サイト作成</td>
                    </tr>
              </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection