@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザのプロファイル画像を表示--}}
            <img class="rounded img-fluid img-thumbnail my-4" src="{{ asset('storage/profiles/'.$user->profile_image) }}" style="width:80%; height:auto" alt="プロフィール画像">
            
            <div class="mb-5">
                <h3>{{ $user->name }}</h3>
            </div>
            @if (Auth::id() == $user->id)
                <div class="my-2">
                    {{-- メッセージ編集ページへのリンク --}}
                     {!! link_to_route('users.edit', 'プロフィールを編集', ['user' => $user->id], ['class' => 'btn btn-secondary']) !!}
                </div>
                <div class="my-2">
                    {{-- メッセージ編集ページへのリンク --}}
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        {!! Form::submit('アカウントを削除', ['class' => 'btn btn-secondary']) !!}
                    {!! Form::close() !!}
                </div>
            @endif
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