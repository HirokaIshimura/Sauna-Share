{{-- ユーザのプロファイル画像を表示--}}
<div class="user-image">
    <img class="rounded img-fluid img-thumbnail my-4" src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="プロフィール画像">
</div>

<div class="mb-5">
    <h3>{{ $user->name }}</h3>
</div>
@if (Auth::id() == $user->id)
    <div class="my-2">
        {{-- メッセージ編集ページへのリンク --}}
         {!! link_to_route('users.edit', 'プロフィールを編集', ['user' => $user->id], ['class' => 'btn btn-secondary btn-sm']) !!}
    </div>
    <div class="my-2">
        {{-- メッセージ編集ページへのリンク --}}
        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('アカウントを削除', ['class' => 'btn btn-secondary btn-sm']) !!}
        {!! Form::close() !!}
    </div>
@endif
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')
