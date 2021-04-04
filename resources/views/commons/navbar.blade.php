<header class="mb-4" style="z-index:2000;">
    <nav class="navbar navbar-expand-sm navbar-light bg-light" style="z-index:1000;">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/"><img src="{{ asset('/images/logo.png')}}"></a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                    <!--Max計算ページへのリンク-->
                    <li class="navi-item"><a class="nav-link" href="#">Max計算</a></li>
                    {{-- ユーザー一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown" style="z-index:2000;">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">MyPage</a>
                        <ul class="dropdown-menu dropdown-menu-right" style="z-index:2000;">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item" style="z-index:2000;">{!! link_to_route('users.show', 'プロフィール', ['user' => Auth::id()]) !!}</li>
                            {{-- お気に入り一覧ページへのリンク --}}
                            <li class="nav-item" style="z-index:2000;"><a href="#" class="nav-link">お気に入り</a></li>
                            
                            <li class="dropdown-divider" style="z-index:2000;"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item" style="z-index:2000;">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログインする', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>