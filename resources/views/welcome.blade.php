@extends('layouts.app')

@section('content')
    @if(Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="text-center my-auto">
            <h1 class="headcontent p-4">Welcome to MuscleShare</h1>
            <p class="p-4" style="line-height:4rem">
                MuscleShareは無料で始められて、日々のトレーニングのメニューを写真と共にシェアできます。
                このコミュニティを通して、新しいトレーニング仲間ができるかもしれません。
                フォローしている仲間のメニューから、自分に合った新しい発見があるかもしれません。
                さあ、あなたもトレーニングの新しいコミュニティを体験してみましょう。
            </p>
            <div class="row">
                <div class="offset-md-1 col-md-5 p-4 mt-md-5">
                    <!--ユーザー登録ページのリンク-->
                    {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-secondary btn-block']) !!}
                </div>
                <div class="col-md-5 p-4 mt-md-5">
                    <!--ログインページへのリンク-->
                    {!! link_to_route('login', 'ログインする', [], ['class' => 'btn btn-lg btn-secondary btn-block']) !!}
                </div>
            </div>
        </div>
    @endif
@endsection