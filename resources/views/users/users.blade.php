@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <div class="media-body card">
                    <div class="card-body user-list-card">
                        <div style="display:flex; flex-direction:row;">
                            {{-- プロフィール画像の表示 --}}
                            @if ($user->profile_image == null)
                            <i class="mr-2 fas fa-user" style="size:7x; color:black; width:60px; height:60px; border-radius:50%;"></i>
                            @else
                            <img class="mr-2" style="width:60px; height:60px; border-radius:50%;" src="https://myapp-images-bucket.s3-ap-northeast-1.amazonaws.com/{{ $user->profile_image }}" alt="プロフィール画像">
                            @endif
                            {{-- ユーザ詳細ページへのリンク --}}
                            <span class="h5 ml-2 pb-2">{!! link_to_route('users.show', $user->name, ['user' => $user->id], ['class' => 'text-dark']) !!}</sapn>
                            
                            <div>
                                @include('user_follow.follow_button')
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif
