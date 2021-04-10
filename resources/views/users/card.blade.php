<div class="user-card">
    {{-- ユーザのプロファイル画像を表示--}}
    <div class="user-image">
        <img class="img-fluid img-thumbnail my-4" style="border-radius:50%;" src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="プロフィール画像">
    </div>
    
    <div class="mb-3">
        <h3>{{ $user->name }}</h3>
    </div style="display:flex; flex-direction:column;">
    @if (Auth::id() == $user->id)
        <div class="my-2">
            {{-- ユーザープロフィール編集ページへのリンク --}}
             {!! link_to_route('users.edit', 'プロフィールを編集', ['user' => $user->id], ['class' => 'btn btn-primary btn-sm']) !!}
        </div>
        <div class="my-2">
            {{-- アカウント削除ページへのリンク --}}
            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('アカウントを削除', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    @endif
    {{-- フォロー／アンフォローボタン --}}
    @include('user_follow.follow_button')
</div>
