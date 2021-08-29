@extends('layouts.articles_app')

@section('title', '記事一覧')

@section('content')
  @include('article_nav')
  <div class="container mt-3">
    @foreach($articles as $article)
    @include('articles.card')
    @endforeach
  </div>
  {{-- <a href="{{route('top')}}"
   class="bg-success text-white d-inline-block d-flex justify-content-center align-items-center flex-column"
   role="button"
   style="position: fixed; bottom: 30px; right: 30px; width: 150px; height: 150px; border-radius: 75px;"
  >
    <div style="font-size: 24px;">お買い物</div>
    <div>
        <i class="fas fa-shopping-bag" style="font-size: 30px;"></i>
    </div>
</a> --}}
@endsection

