<div class="card mb-5 mt-5">
    <div class="article-picture">
        <div class="article-picture-size">
        @if (!empty($article->article_image_file_name))
            <img class="card-img-top" src="/storage/article-images/{{$article->article_image_file_name}}">
        @else
            <img src="/images/noimage.jpg">
        @endif
        </div>
    <div class="article-body">
        <div class="card-body d-flex flex-row">
            <a href="{{ route('mypage.show', ['name' => $article->user->name]) }}" class="text-dark">
                @if (!empty($article->user->avatar_file_name))
                    <img src="/storage/avatars/{{$article->user->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
                @else
                    <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
                @endif
            </a>

            <div class= "ml-2" >
                <div class="font-weight-bold ">
                <a href="{{ route('mypage.show', ['name' => $article->user->name]) }}" class="text-dark">{{ $article->user->name }}</a>
                </div>
            </div>

            @if( Auth::id() === $article->user_id )
            <!-- dropdown -->
                <div class="ml-3 d-flex flex-row">
                    <a class="ml-2" href="{{ route("articles.edit", ['article' => $article]) }}">
                        <i class="fas fa-pen mr-1"></i>更新
                    </a>
                    <a class="ml-2 text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                        <i class="fas fa-trash-alt mr-1"></i>削除
                    </a>
                </div>
            <!-- dropdown -->
            <!-- modal -->
            <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                        {{ $article->title }}を削除します。よろしいですか？
                        </div>
                        <div class="modal-footer justify-content-between">
                        <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                        <button type="submit" class="btn btn-danger">削除する</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- modal -->
            @endif
        </div>

        <div class="card-body pt-0">
            <h3 class="h3 card-title">
            <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
                {{ $article->title }}
            </a>
            </h3>
            <div class="card-text">
            {{ $article->body }}
            </div>
        </div>
        <div class="card-body pt-0 pb-2 pl-3">
            <div class="card-text">
            <article-like
                :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($article->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('articles.like', ['article' => $article]) }}"
            >
            </article-like>
            </div>
        </div>
        @foreach($article->tags as $tag)
            @if($loop->first)
            <div class="card-body pt-0 pb-4 pl-3">
                <div class="card-text line-height">
            @endif
            <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                    {{ $tag->hashtag }}
                </a>
            @if($loop->last)
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
</div>
