@extends('layouts.app')

@section('content')
<h1>投稿を編集</h1>
<div class="row mx-auto">
    <div class="col-sm-8 offset-sm-2">

        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
        @csrf
            <div class="form-group mb-2">
                {!! Form::label('title', '名前:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            
            @if($post->picture_url != null)
            <div class="form-group mb-2">
                <p>写真</p>
                <img src ="https://myapp-images-bucket.s3-ap-northeast-1.amazonaws.com/{{ $post->picture_url }}">
            </div>
            @endif
            
            <div class="form-group mb-4">
                {!! Form::label('content', '詳細:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('更新する', ['class' => 'btn btn-secondary mb-5']) !!}
        {!! Form::close() !!}

        {{-- 投稿削除ボタンのフォーム --}}
        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('このシェアを削除', ['class' => 'btn btn-danger btn-sm']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection
