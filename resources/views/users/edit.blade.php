@extends('layouts.app')

@section('content')

    <h1>プロフィール編集</h1>
    
    <div class="row mr-auto">
        <div class="col-sm-6 offset-sm-2">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            @csrf
                <div class="form-group pb-3">
                    {!! Form::label('name', 'ユーザー名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <p class="text-white ">プロフィール画像：</p>
                <div class="form-group btn pb-4">
                    <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" id="img">
                    <input id="profile_image" type="file"  name="profile_image" onchange="previewImage(this);">
                </div>
                
                <div class="form-group mb-5">
                    {!! Form::submit('更新', ['class' => 'btn btn-secondary ']) !!}
                </div>

            {!! Form::close() !!}
        </div>
        <div class="col-sm-4 mb-5">
            {{-- アカウント削除ページへのリンク --}}
            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('アカウントを削除', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>



@endsection