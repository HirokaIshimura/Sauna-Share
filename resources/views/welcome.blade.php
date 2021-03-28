@extends('layouts.app')

@section('content')

<div class="text-center">
    <h1 class="welcome">Welcome to MuscleShare</h1>
    <!--ユーザー登録ページのリンク-->
    {!! link_to_route('signup.get', 'ユーザー登録（無料）', [], ['class' => 'btn btn-lg btn-secondary']) !!}
</div>

@endsection