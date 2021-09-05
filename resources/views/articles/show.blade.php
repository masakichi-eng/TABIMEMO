@extends('layouts.articles_app')

@section('title', '記事詳細')

@section('content')
  @include('article_nav')
  <div class="container">
    @include('articles.card')
  </div>
@endsection
