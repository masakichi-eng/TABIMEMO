<header class="header">
    <div class="header-inner" id="header">
      <h3 class="header-logo ml-3">
        <a class="header-nav-item-link" href="/">Tabimemo</a>
      </h3>
      <nav class="drawer-nav header-nav" >
        <ul id="navi" class="drawer-menu header-nav-list">
            <li class="header-nav-item">
            <a class="header-nav-item-link" href="#concept">Concept</a>
            </li>
            <li class="header-nav-item">
            <a class="header-nav-item-link" href="#article">Articles</a>
            </li>
            <li class="header-nav-item">
            <a class="header-nav-item-link" href="#shopping">Shopping</a>
            </li>

            <li class="header-nav-item">
            <a class="header-nav-item-link" href="{{ route('articles.index') }}">記事一覧</a>
            </li>

            <li class="header-nav-item">
                <a class="header-nav-item-link" href="{{ route('top') }}">商品一覧</a>
            </li>

            @guest
            <li class="header-nav-item">
            <a class="header-nav-item-link" href="{{ route('register') }}">ユーザー登録</a>
            </li>
            @endguest

            @guest
            <li class="header-nav-item">
            <a class="header-nav-item-link" href="{{ route('login') }}">ログイン</a>
            </li>
            @endguest

            @auth
            <li class="header-nav-item">
            <a class="header-nav-item-link">
                @if (!empty(Auth::user()->avatar_file_name))
                    <img src="/storage/avatars/{{Auth::user()->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
                @else
                    <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
                @endif
            </a>
            </li>
            <li class="header-nav-item-btn">
                <button class="header-nav-item-link" type="button"
                        onclick="location.href='{{ route('mypage.show', ['name' => Auth::user()->name]) }}'">
                        {{ Auth::user()->name }}
                </button>
            </li>
            <li class="header-nav-item-btn mr-3">
                <button form="logout-button" class="header-nav-item-link" type="submit">
                ログアウト
                </button>
            </li>
            <form id="logout-button" method="POST" action="{{ route('logout') }}">
            @csrf
            </form>
            @endauth
        </ul>
      </nav>
          <!-- ボタン部分ここを後で追加するだけ-->
      <div class="nav_btn" id="nav_btn">
        <span class="hamburger_line hamburger_line1"></span>
        <span class="hamburger_line hamburger_line2"></span>
        <span class="hamburger_line hamburger_line3"></span>
      </div>
      <div class="nav_bg" id="nav_bg"></div>
        <!-- /ボタン部分ここを後で追加するだけ-->
    </div>
  </header>

{{-- <div id="header">
    <nav>
    <ul id="navi">
    <li><a href="#">Month</a></li>
    <li><a href="#">Want</a></li>
    <li><a href="#">Do</a></li>
    <li><a href="#">Objective</a></li>
    <li><a href="#">Mypage</a></li>
    </ul>
    </nav>
    <!-- ボタン部分ここを後で追加するだけ-->
    <div class="nav_btn" id="nav_btn">
    <span class="hamburger_line hamburger_line1"></span>
    <span class="hamburger_line hamburger_line2"></span>
    <span class="hamburger_line hamburger_line3"></span>
    </div>
    <div class="nav_bg" id="nav_bg"></div>
    <!-- /ボタン部分ここを後で追加するだけ-->
</div> --}}
