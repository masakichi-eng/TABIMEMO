@extends('layouts.articles_app')

@section('title', '記事一覧')

@section('content')
  @include('article_nav')
  <div class="container mt-3">
    @foreach($articles as $article)
    @include('articles.card')
    @endforeach
  </div>
  <a href="{{ route('articles.create') }}"
   class="bg-success text-white d-inline-block d-flex justify-content-center align-items-center flex-column"
   role="button"
   style="position: fixed; bottom: 30px; right: 30px; width: 150px; height: 150px; border-radius: 75px;"
  >
    <div style="font-size: 24px;">投稿</div>
    <div>
        <i class="fab fa-avianex" style="font-size: 30px;"></i>
    </div>
</a>
@endsection

