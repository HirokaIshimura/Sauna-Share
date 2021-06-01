@extends('layouts.app')

@section('content')
<div class="mx-auto">
    <h1>サウナグッズ検索</h1>
    
    {!! Form::open(['action' => 'SearchController@index']) !!}
    @csrf
    <div class="row">
        <div class="form-group col-8">
            {!! Form::text('keyword', old('keyword'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-4">
            {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection