@extends('layouts.app')

@section('content')
     <div class="row">
        <aside class="col-sm-2">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-10">
       @include('tasks.index',['tasks' => $tasks,])
       </div>
       
   
   
   
@endsection