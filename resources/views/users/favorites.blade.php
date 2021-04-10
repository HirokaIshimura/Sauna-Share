@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-3">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-9">
            {{-- タブ --}}
            @include('users.navtabs')
            {{-- ユーザ一覧 --}}
            @include('posts.posts')
        </div>
    </div>
@endsection