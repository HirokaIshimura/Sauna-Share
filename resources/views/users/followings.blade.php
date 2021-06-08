@extends('layouts.app')

@section('content')
<div class="row m-auto">
    <div class="col-sm-10 offset-sm-1">
        <!-- ユーザ情報 -->
        @include('users.card')
        <!-- タブ -->
        @include('users.navtabs')
        <!-- フォロー一覧 -->
        @include('users.users')
    </div>
</div>
@endsection