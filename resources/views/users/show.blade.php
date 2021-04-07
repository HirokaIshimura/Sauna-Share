@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3">
             @include('users.card')
        </div>
        
        <div class="col-9">
            @include('users.navtabs')
            @include('posts.posts')
        </div>
    </div>
@endsection