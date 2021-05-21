<header class="mb-4 sticky-top">
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/"><i class="fas fa-home fa-2x"></i></a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                    <!--グッズ検索ページへのリンク-->
                    <li class="navi-item">
                        {!! link_to_route('search.form', 'サウナグッズ検索', [], ['class' => 'nav-link', 'style' => 'font-size:20px']) !!}
                    </li>
                    <!-- ユーザー一覧ページへのリンク -->
                    <li class="nav-item">
                        {!! link_to_route('users.index', 'ユーザー', [], ['class' => 'nav-link', 'style' => 'font-size:20px']) !!}
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:20px">MyPage</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!-- ユーザ詳細ページへのリンク -->
                            <li class="dropdown-item">
                                {!! link_to_route('users.show', 'プロフィール', ['user' => Auth::id()], ['class' => 'text-muted']) !!}
                            </li>
                            <!--  お気に入り一覧ページへのリンク -->
                            <li class="dropdown-item">
                                <a href="{{ route('users.favorites', ['id' => Auth::id()]) }}" class="text-muted {{ Request::routeIs('users.favorites') ? 'active' : '' }}">
                                    お気に入り
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <!--  ログアウトへのリンク -->
                            <li class="dropdown-item">
                                {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'text-muted']) !!}
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item" style="font-size:20px">
                        {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'nav-link']) !!}
                    </li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item" style="font-size:20px">
                        {!! link_to_route('login', 'ログインする', [], ['class' => 'nav-link']) !!}
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>