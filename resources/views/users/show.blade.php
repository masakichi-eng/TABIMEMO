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
        <div class="container">
            <div class="row">
                <div class="col-10 offset-1 bg-white">
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">出品した商品</div>
                    <div class="dropdown-item-text">
                        <div class="row no-gutters">
                            <div class="col">売上金</div>
                            <div class="col-auto">
                                <i class="fas fa-yen-sign"></i>
                                <span class="ml-1">{{number_format($user->sales)}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item-text">
                        <div class="row no-gutters">
                            <div class="col">出品数</div>
                            <div class="col-auto">{{number_format($user->soldItems->count())}} 個</div>
                        </div>
                    </div>
                    @foreach ($s_items as $s_item)
                        <div class="d-flex mt-3 border position-relative">
                            <div>
                                <img src="/storage/item-images/{{$s_item->image_file_name}}" class="img-fluid" style="height: 140px;">
                            </div>
                            <div class="flex-fill p-3">
                                <div>
                                    @if ($s_item->isStateSelling)
                                        <span class="badge badge-success px-2 py-2">出品中</span>
                                    @else
                                        <span class="badge badge-dark px-2 py-2">売却済</span>
                                    @endif
                                    <span>{{$s_item->secondaryCategory->primaryCategory->name}} / {{$s_item->secondaryCategory->name}}</span>
                                </div>
                                <div class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$s_item->name}}</div>
                                <div>
                                    <i class="fas fa-yen-sign"></i>
                                    <span class="ml-1">{{number_format($s_item->price)}}</span>
                                    <i class="far fa-clock ml-3"></i>
                                    <span>{{$s_item->created_at->format('Y年n月j日 H:i')}}</span>
                                </div>
                            </div>
                            <a href="{{ route('item', [$s_item->id]) }}" class="stretched-link"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-10 offset-1 bg-white">

                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">購入した商品</div>

                    @foreach ($b_items as $b_item)
                        <div class="d-flex mt-3 border position-relative">
                            <div>
                                <img src="/storage/item-images/{{$b_item->image_file_name}}" class="img-fluid" style="height: 140px;">
                            </div>
                            <div class="flex-fill p-3">
                                <div>
                                    <span class="badge badge-dark px-2 py-2">売却済</span>
                                    <span>{{$b_item->secondaryCategory->primaryCategory->name}} / {{$b_item->secondaryCategory->name}}</span>
                                </div>
                                <div class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$b_item->name}}</div>
                                <div>
                                    <i class="fas fa-yen-sign"></i>
                                    <span class="ml-1">{{number_format($b_item->price)}}</span>
                                    <i class="far fa-clock ml-3"></i>
                                    <span>{{$b_item->bought_at->format('Y年n月j日 H:i')}}</span>
                                </div>
                            </div>
                            <a href="{{ route('item', [$b_item->id]) }}" class="stretched-link"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
