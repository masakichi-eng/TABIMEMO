<header class="header">
    <div class="header-inner" id="header">
      <h3 class="header-logo ml-3">
        <a class="header-nav-item-link" href="/">Tabimemo</a>
      </h3>

      <nav class="drawer-nav header-nav" >
        <ul id="navi" class="drawer-menu header-nav-list">
            <li class="header-nav-item-btn mr-3 mt-3">
                <form class="form-inline" method="GET" action="{{ route('top') }}">
                    <div class="input-group">
                        <div class="input-group-prepend" >
                            <select class="custom-select" name="category">
                                <option value="">カテゴリ</option>
                                @foreach ($categories as $category)
                                    <option value="primary:{{$category->id}}" class="font-weight-bold">{{$category->name}}</option>
                                    @foreach ($category->secondaryCategories as $secondary)
                                        <option value="secondary:{{$secondary->id}}">　{{$secondary->name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <input type="text" name="keyword" class="form-control" aria-label="Text input with dropdown button" placeholder="キーワード検索">
                        <div class="input">
                            <button type="submit" class="btn" style="margin: 0 0 0 5px;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
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


