@extends('layouts.app')

@section('content')
<div class="top-page">
    <div class="text-center pt-5">
        <h1>ユーザー登録</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6 offset-md-3 my-auto">
            {!! Form::open(['route' => 'signup.post']) !!}
            
                <div class="form-group py-4">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group pb-4">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group pb-4">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group pb-5">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group pt-3 mb-5">
                    {!! Form::submit('登録する', ['class' => 'btn btn-secondary btn-block']) !!}
                </div>
    
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection