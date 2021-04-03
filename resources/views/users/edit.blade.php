@extends('layouts.app')

@section('content')

    <h1>プロフィール編集</h1>
    
    <div class="row mr-auto">
        <div class="col-sm-6 offset-sm-2">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            @csrf
                <p class="text-white">プロフィール画像：</p>
                <div class="form-group btn pb-4">
                    <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" id="img">
                    <input id="profile_image" type="file"  name="profile_image" onchange="previewImage(this);">
                </div>
                
                <div class="form-group pb-4">
                    {!! Form::label('name', 'ユーザー名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group pt-5 mb-3">
                    {!! Form::submit('更新', ['class' => 'btn btn-secondary ']) !!}
                </div>

        
            {!! Form::close() !!}
        </div>
    </div>



@endsection