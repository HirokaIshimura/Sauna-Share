@extends('layouts.app')

@section('content')
<div class="row mx-auto">
    <div class="col-sm-8 offset-sm-2">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
            <div class="form-group mb-2">
                {!! Form::label('title', '部位:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group mb-2">
                <p>写真</p>
                <img src="{{ asset('storage/post_pictures/'.$post->picture_url) }}" id="img">
            </div>
            
            <div class="form-group mb-4">
                {!! Form::label('content', 'メニュー:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('更新する', ['class' => 'btn btn-secondary mb-5']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection
