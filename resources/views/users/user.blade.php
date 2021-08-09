<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="{{ route('mypage.show', ['name' => $user->name]) }}" class="text-dark">
        <i class="fas fa-user-circle fa-3x"></i>
      </a>
      @if( Auth::id() !== $user->id )
        <follow-button
          class="ml-auto"
          :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('follow', ['name' => $user->name]) }}"
        >
        </follow-button>
      @endif
    </div>
    <h2 class="h5 card-title m-0">
      <a href="{{ route('mypage.show', ['name' => $user->name]) }}" class="text-dark">
        {{ $user->name }}
      </a>
    </h2>
  </div>
  <div class="card-body">
    <div class="card-text">
      <a href="{{ route('mypage.followings', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followings }} フォロー
      </a>
      <a href="{{ route('mypage.followers', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followers }} フォロワー
      </a>
    </div>
  </div>
</div>
