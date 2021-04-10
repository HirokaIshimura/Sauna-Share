@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-3">
             @include('users.card')
        </div>
        
        <div class="col-sm-9">
            @include('users.navtabs')
            @include('posts.posts')
        </div>
    </div>
@endsection