<div class="user-card">
    {{-- ユーザのプロファイル画像を表示--}}
    <div class="user-image">
        @if ($user->profile_image == null)
        <i class="mr-2 fas fa-user" style="color:black; size:7x; width:150px; height:150px; border-radius:50%;"></i>
        @else
        <img class="mr-2" style="width:150px; height:150px; border-radius:50%;" src="https://myapp-images-bucket.s3-ap-northeast-1.amazonaws.com/{{ $user->profile_image }}" alt="プロフィール画像">
        @endif
    </div>
    
    <div class="mb-3 user-card-name">
        <h2>{{ $user->name }}</h2>
    </div>

    @if (Auth::id() == $user->id)
    <div class="my-2 user-card-edit">
        <!-- ユーザープロフィール編集ページへのリンク -->
        {!! link_to_route('users.edit', 'プロフィールを編集', ['user' => $user->id], ['class' => 'btn btn-secondary btn-sm']) !!}
    </div>
    @endif

    {{-- フォロー／アンフォローボタン --}}
    @include('user_follow.follow_button')
</div>
