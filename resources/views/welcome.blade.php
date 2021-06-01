@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row m-auto">
            <div class="col-sm-6 offset-sm-3">
                @include('posts.index')
            </div>
        </div>
    @else
        <div class="text-center m-auto top-page">
            <h1 class="headcontent p-4 m-auto" style="font-size:70px;">Welcome to SaunaShare</h1>
            <p class="pt-4 px-4" style="line-height:4rem; font-size:20px;">
                SaunaShareは無料で始められて、あなたが行ったサウナを写真と共にシェアできます。
                このコミュニティを通して、新しいサウナ仲間ができるかもしれません。
                フォローしている友達のシェアから、行ってみたいサウナが発見できるかもしれません。
                さあ、あなたも新しいサウナコミュニティを体験してみましょう。
            </p>
            <div class="row">
                <div class="offset-md-1 col-md-3 p-4 mt-md-5">
                    <!--ユーザー登録ページのリンク-->
                    {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-secondary btn-block']) !!}
                </div>
                <div class="col-md-3 p-4 mt-md-5">
                    <!--ログインページへのリンク-->
                    {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-secondary btn-block']) !!}
                </div>
                <div class="col-md-3 p-4 mt-md-5">
                    <!--ログインページへのリンク-->
                    {!! link_to_route('guestlogin', 'ゲストログイン', [], ['class' => 'btn btn-lg btn-secondary btn-block']) !!}
                </div>
            </div>
            <div class="pb-5">
                <p style="font-size:20px;">＊採用担当者様はゲストログインへお進みください。
                あらかじめセットされているログイン情報でログイン可能となっております。</p>
            </div>
        </div>
    @endif
@endsection