@extends('layouts.articles_app')

@section('title', '記事投稿')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}"  enctype="multipart/form-data">
                @include('articles.form')
                <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   <!-- Scripts -->
  <script>
        document.querySelector('.image-picker input')
        .addEventListener('change', (e) => {
        const input = e.target;
        const reader = new FileReader();
        reader.onload = (e) => {
        input.closest('.image-picker').querySelector('img').src = e.target.result
        };
        reader.readAsDataURL(input.files[0]);
    });
    </script>

@endsection
