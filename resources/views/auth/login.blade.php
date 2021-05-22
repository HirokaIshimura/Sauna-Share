@extends('layouts.app')

@section('content')
<div class="top-page">
    <div class="text-center pt-5">
        <h1>ログイン</h1>
    </div>

    <div class="row my-auto">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group pb-4">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', 'recruit@example.com', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group pb-4">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group pt-5 pb-3">
                    {!! Form::submit('ログインする', ['class' => 'btn btn-secondary btn-block']) !!}
                </div>
            {!! Form::close() !!}

            <div class="pb-4">
                <p>＊採用担当者様は、パスワードを打ち込んでいただくとログイン可能となっております。<br><br>
                    ＜採用担当者様専用アカウント><br>
                    メールアドレス：recruit@example.com<br>
                    パスワード：password<br>
                </p>
            </div>

            <!-- ユーザ登録ページへのリンク -->
            <p class="mb-4">ユーザー登録されていない方は {!! link_to_route('signup.get', 'こちら') !!}</p>
        </div>
    </div>
</div>
@endsection