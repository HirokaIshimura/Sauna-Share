@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <div class="media-body card">
                    <div class="card-body bg-light">
                        <div style="display:flex; flex-direction:row;">
                            {{-- ユーザのプロファイル画像を表示 --}}
                            <img class="mr-2" style="width:70px; height:70px; border-radius:50%;" src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="プロフィール画像">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <span class="h5 ml-2">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</sapn>
                            
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
