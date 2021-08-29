<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="{{ route('mypage.show', ['name' => $user->name]) }}" class="text-dark">
        @if (!empty($user->avatar_file_name))
        <img src="/storage/avatars/{{$user->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
        @else
            <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
        @endif
      </a>

      <h2 class="h5 card-title mt-2">
        <a href="{{ route('mypage.show', ['name' => $user->name]) }}" class="text-dark">
          {{ $user->name }}
        </a>
      </h2>


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

    @if( Auth::id() == $user->id )
    <a href="{{ route('mypage.edit-profile') }}">
        <i class="far fa-address-card text-left" style="width: 30px"></i>プロフィール編集
    </a>
    @endif
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
