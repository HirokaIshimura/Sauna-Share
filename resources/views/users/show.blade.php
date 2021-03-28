@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                </div>
                <div class="card-footer">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>

            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                {{-- ユーザ詳細タブ --}}
                <li class="nav-item"><a href="#" class="nav-link">シェア</a></li>
                {{-- フォロー一覧タブ --}}
                <li class="nav-item"><a href="#" class="nav-link">フォロー</a></li>
                {{-- フォロワー一覧タブ --}}
                <li class="nav-item"><a href="#" class="nav-link">フォロワー</a></li>
                {{-- お気に入り一覧タブ　--}}
                <li class="nav-item"><a href="#" class="nav-link">お気に入り</a></li>
            </ul>
        </div>
    </div>
@endsection