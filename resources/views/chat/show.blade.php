@extends('layouts.matching')

@section('content')

<div class="chatPage">
  <header class="header">
  <a href="{{route('matching')}}" class="linkToMatching"></a>
    <div class="chatPartner">
      <div class="chatPartner_img"><img src="/storage/avatars/{{$chat_room_user -> avatar_file_name}}"></div>
      <div class="chatPartner_name">{{ $chat_room_user -> name }}</div>
    </div>
  </header>
  <div class="container">
    <div class="messagesArea messages">
    @foreach($chat_messages as $message)
    <div class="message">
      @if($message->user_id == Auth::id())
        <span>{{Auth::user()->name}}</span>
      @else
        <span>{{$chat_room_user_name}}</span>
      @endif

      <div class="commonMessage">
        <div>
        {{$message->message}}
        </div>
      </div>
    </div>
    @endforeach
    </div>
  </div>
  <form class="messageInputForm d-flex">
    <div class='container col-10'>
      <input type="text" id="chat_message" data-behavior="chat_message" class="messageInputForm_input" placeholder="メッセージを入力...">
    </div>
    <button type="button" class="messageInputForm_input col-2 btn btn-primary" data-behavior="chat_message">
        送信
    </button>
  </form>
</div>

<script>
var chat_room_id = {{ $chat_room_id }};
var user_id = {{ Auth::user()->id }};
var current_user_name = "{{ Auth::user()->name }}";
var chat_room_user_name = "{{ $chat_room_user_name }}";
</script>

@endsection

