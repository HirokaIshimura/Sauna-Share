@extends('layouts.app')

@section('content')
<div class="row mx-auto">
    <div class="col-sm-8 offset-sm-2">
        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form">
                <div class="form-title">
                    <p>部位</p>
                    <input class="mb-4" name="title" value="{{ old('title') }}">
                </div>
                
                <div class="form-content">
                    <p>メニュー</p> 
                    <textarea class="mb-4" name="content" cols="50" rows="10">{{ old('content') }}</textarea>        
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
            </div>
        </form>
    </div>
</div>
@endsection
