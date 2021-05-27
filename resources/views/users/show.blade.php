@extends('layouts.app')

@section('content')
<div class="row m-auto">
    <div class="col-sm-10 offset-sm-1">
        @include('users.card')
        @include('users.navtabs')
        @include('posts.posts')
    </div>
</div>
@endsection