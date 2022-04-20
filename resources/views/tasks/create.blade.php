@extends('layouts.app')

@section('content')
    <div class="row">
        
        <div class="col-sm-8">
               {!! Form::open(['route' => 'tasks.store']) !!}
                 <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div> 
                
                <div class="form-inline">
                    {!! Form::label('start_date', '開始時刻:') !!}
                    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                    <div><input type="text" id="picker1" name="start_time" placeholder="開始時間" class="form-control"></div>
                </div> 
                
                <div class="form-inline">
                    {!! Form::label('end_date', '終了時刻:') !!}
                    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                    <div><input type="text" id="picker2" name="end_time" placeholder="終了時間" class="form-control"></div>
                </div> 
        
                <div class="form-group">
                    {!! Form::label('place', '場所:') !!}
                    {!! Form::text('place', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                    <div class="d-flex justify-content-around">
                    {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}
                    <input value="前に戻る" onclick="history.back();" type="button">
                    </div>
            {!! Form::close() !!}
        </div>
    </div>
    @include('tasks.start_time')
    @include('tasks.end_time')
@endsection