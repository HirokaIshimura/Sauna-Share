@if ($user->is_favoriting($post->id))
    {{-- お気に入り解除ボタンのフォーム --}}
    {!! Form::open(['route' => ['unfavorite.posts', $post->id], 'method' => 'delete']) !!}
        {!! Form::submit('お気に入りを外す', ['class' => "btn btn-warning btn-sm border-warning"]) !!}
    {!! Form::close() !!}
@else
    {{-- お気に入りボタンのフォーム --}}
    {!! Form::open(['route' => ['favorite.posts', $post->id]]) !!}
        {!! Form::submit('お気に入り', ['class' => "btn btn-light btn-sm border-warning"]) !!}
    {!! Form::close() !!}
@endif
