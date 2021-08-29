@extends('layouts.articles_app')

@section('title', $user->name)

@section('content')
  @include('article_nav')
  <div class="container">
  @include('users.user')
  @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false])
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection
