@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                {{-- ユーザのプロファイル画像を表示 --}}
                <img class="mr-2 rounded" src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="プロフィール画像">
                <div class="media-body">
                    <div class="text-white h4">
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p class="h5">{!! link_to_route('users.show', 'プロフィール', ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif
