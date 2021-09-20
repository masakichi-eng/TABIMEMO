@extends('layouts.articles_app')

@section('title', '記事一覧')

@section('content')
  @include('navtop')
  <div class="top">
    <div class="top-picture"></div>
    <div class="top-message">
      <p class="top-message-title">
        さあ、<br class="is-pc" />
        旅に出よう！
      </p>
      <p class="top-message-text">
        旅先の思い出をシェアできる<br>
        思い出共有アプリ「Tabimemo」
      </p>
    </div>
  </div>


  <section id="concept" class="concept inner section">
    <h2 class="util-title">Concept</h2>
    <div class="concept-inner">
      <div class="concept-picture" ><img src="/images/article.jpg" alt="picture" style="width:100%;"></div>
      <div class="concept-message">
        <p class="concept-message-title">旅の思い出、自分で楽しむだけじゃなく<br> みんなと共有してみませんか？
        </p>
        <p class="concept-message-text">「Tabimemo」は、旅先でとった写真や思い出を記事にして仲間とシェアできるアプリです。お土産なども売り買いできる今までにないECサイトの役割も兼ねています。まずは気軽に思い出を投稿して旅好きと繋がろう！</p>
      </div>
    </div>
  </section>
  <!-- /.concept -->

  <section id="article" class="article inner section">
    <h2 class="util-title">Articles</h2>
    <div class="article-inner">
        <div class="container ">
            @foreach($articles as $article)
            @include('articles.card')
            @endforeach
        </div>
        <div class="item-footer">
            <button class="util-link" type="button"
            onclick="location.href='{{ route('articles.index') }}'">
            MORE
            </button>
        </div>
    </div>
  </section>

  <section id="shopping" class="shopping inner section">
    <h2 class="util-title">Shopping</h2>
    <div class="shopping-inner">
        <div class="shopping-picture" ><img src="/images/shopping.jpg" alt="picture" style="width:100%;"></div>
      <div class="shopping-message">
        <p class="shopping-message-title">旅先で見つけたオススメを<br>商品として出品もできます。
        </p>
        <p class="shopping-message-text">旅先で購入したお土産などを出品したり、購入することもできます。地域限定の品物などを手に入れるチャンスです。</p>
      </div>
    </div>
  </section>

  <section id="item" class="item inner section">
    <h2 class="util-title">Items</h2>
    <div class="item-inner">
        <div class="container" style="text-align: center;">
            <div class="items-section">
                @foreach ($items as $item)
                    <div class="item-box">
                        <div class="card">
                            <div class="position-relative overflow-hidden">
                                <img class="card-img-top" src="/storage/item-images/{{$item->image_file_name}}">
                                <div class="position-absolute py-2 px-3" style="left: 0; bottom: 20px; color: white; background-color: rgba(0, 0, 0, 0.70)">
                                    <i class="fas fa-yen-sign"></i>
                                    <span class="ml-1">{{number_format($item->price)}}</span>
                                </div>
                                @if ($item->isStateBought)
                                    <div class="position-absolute py-1 font-weight-bold d-flex justify-content-center align-items-end" style="left: 0; top: 0; color: white; background-color: #EA352C; transform: translate(-50%,-50%) rotate(-45deg); width: 125px; height: 125px; font-size: 20px;">
                                        <span>SOLD</span>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <small class="text-muted">{{$item->secondaryCategory->primaryCategory->name}} / {{$item->secondaryCategory->name}}</small>
                                <h5 class="card-title">{{$item->name}}</h5>
                            </div>
                            <a href="{{ route('item', [$item->id]) }}" class="stretched-link"></a>
                        </div>
                    </div>
                @endforeach
            </div>
             {{-- <div class="d-flex justify-content-center">
                 {{ $items->links() }}
             </div> --}}
        </div>

        <div class="item-footer">
            <button class="util-link" type="button"
            onclick="location.href='{{ route('top') }}'">
            MORE
            </button>
        </div>
    </div>
  </section>

  <section id="matching" class="matching inner section">
    <h2 class="util-title">Matching</h2>
    <div class="matching-inner">
        <div class="matching-picture" ><img src="/images/matching.jpg" alt="picture" style="width:100%;"></div>
      <div class="matching-message">
        <p class="matching-message-title">気の合う仲間と<br>マッチングして旅行に行こう。
        </p>
        <p class="matching-message-text">旅好きの仲間とマッチングして旅トークしよう！一緒に旅行に行く仲間になれるかも</p>
      </div>
    </div>

    <div class="matching-footer">
        <button class="util-link" type="button"
        onclick="location.href='{{ route('home') }}'">
        MORE
        </button>
    </div>
  </section>

<footer class="footer">
    <div class="appname">
        <a href="#"><h3>Tabimemo</h3></a>
    </div>
    <ul class="footer-nav-list">
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-item-link">プライバシーポリシー</a>
      </li>
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-item-link">特定商取引法に基づく表記</a>
      </li>
    </ul>
    <ul class="footer-sns-list">
      <li class="footer-sns-item">
        <a href="#" class="footer-sns-item-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
      </li>
      <li class="footer-sns-item">
        <a href="#" class="footer-sns-item-link" aria-label="instagram"><i class="fab fa-instagram"></i></a>
      </li>
      <li class="footer-sns-item">
        <a href="#" class="footer-sns-item-link" aria-label="line"><i class="fab fa-line"></i></a>
      </li>
    </ul>
    <p class="footer-copyright"><small lang="en">© 2021 Tabimemo All rights reserved</small></p>
</footer>
       <!-- /.footer -->

@endsection
