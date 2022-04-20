@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
        <div class="col-sm-10">
            @include('users.users', ['users' => $users])
        </div>
    </div>
@endsection