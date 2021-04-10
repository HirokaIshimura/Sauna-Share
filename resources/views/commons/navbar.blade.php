<header class="mb-4 sticky-top">
    <nav class="navbar navbar-expand-sm navbar-primary bg-white">
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
                    <li class="navi-item">{!! link_to_route('max.calculate', 'max計算', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ユーザー一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">MyPage</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.show', 'プロフィール', ['user' => Auth::id()]) !!}</li>
                            {{-- お気に入り一覧ページへのリンク --}}
                            <li class="dropdown-item">
                                <a href="{{ route('users.favorites', ['id' => Auth::id()]) }}" class="{{ Request::routeIs('users.favorites') ? 'active' : '' }}">
                                    お気に入り
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
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