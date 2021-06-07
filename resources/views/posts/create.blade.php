@extends('layouts.app')

@section('content')
<div class="row mx-auto">
    <div class="col-sm-8 offset-sm-2">

        {!! Form::model($post, ['route' => 'posts.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @csrf
            <div class="form-group mb-2">
                {!! Form::label('title', '名前:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group mb-4">
                {!! Form::label('content', '詳細:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-picture_url mb-5">
                <p>写真</p>
                <div>
                    <img src="" id="img">
                </div>
                <input id="posts_picture" type="file" name="picture_url" onchange="previewImage(this);">
            </div>
            
            <div class="form-submit mb-5">
                <button class="btn btn-secondary" type="submit">シェアする</button>
            </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
