<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="{{ route('mypage.show', ['name' => $person->name]) }}" class="text-dark">
        @if (!empty($person->avatar_file_name))
        <img src="/storage/avatars/{{$person->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
        @else
            <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
        @endif
      </a>
      @if( Auth::id() !== $person->id )
        <follow-button
          class="ml-auto"
          :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('follow', ['name' => $person->name]) }}"
        >
        </follow-button>
      @endif
    </div>
    <h2 class="h5 card-title m-0">
      <a href="{{ route('mypage.show', ['name' => $person->name]) }}" class="text-dark">{{ $person->name }}</a>
    </h2>
  </div>
</div>
