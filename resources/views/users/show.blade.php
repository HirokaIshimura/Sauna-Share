@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-3">
            @include('users.card')
        </aside>
        
        <div class="col-sm-9">
            @include('users.navtabs')
            @include('posts.posts')
        </div>
    </div>
@endsection