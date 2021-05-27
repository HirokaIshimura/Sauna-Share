@extends('layouts.app')

@section('content')
    <h1 class="users-index"><a href="/users">ユーザー</a></h1>
    <!--  ユーザ一覧  -->
    @include('users.users')
@endsection
