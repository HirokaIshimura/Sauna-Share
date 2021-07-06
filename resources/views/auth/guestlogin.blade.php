@extends('layouts.app')

@section('content')
<div class="top-page">
    <div class="text-center pt-5">
        <h1>ゲストログイン</h1>
    </div>

    <div class="row my-auto">
        <div class="col-sm-6 offset-sm-3">
            <div class="py-4">
                <p style="font-size:20px;">
                ＊採用担当者様は、パスワードを打ち込んでいただくとログイン可能となっております。<br><br>
                ＜採用担当者様専用アカウント><br>
                メールアドレス：recruit@example.com<br>
                パスワード：testpass<br>
                </p>
            </div>

            {!! Form::open(['route' => 'login.post']) !!}
            <div class="form-group pb-4">
                {!! Form::label('email', 'メールアドレス') !!}
                {!! Form::email('email', 'recruit@example.com', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group pb-4">
                {!! Form::label('password', 'パスワード') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group py-3">
                {!! Form::submit('ゲストログイン', ['class' => 'btn btn-secondary btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection