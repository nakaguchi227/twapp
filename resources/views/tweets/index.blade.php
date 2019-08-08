@extends('layout')

@section('content')


<main>
  <div class="container">
    <div class="row">

      <div class="col col-md-2">
      </div>
      <div class="col col-md-6">
        <nav class="panel panel-default">

          <div class="panel-body">
            @auth
            <a href="{{route('tweet.create')}}" class="btn btn-primary btn-sm">
              新規投稿
            </a>
            @endauth
          </div>

            @foreach($tweets as $tweet)
            <div class="tweet">
                <div class="tweet-head">

                    <a class="tweet-user" href="{{route('user.index', ['id' => $tweet->user_id])}}" >
                        {{ $tweet->user->name }}
                    </a>
                    <p  class="tweet-time">
                      {{ $tweet->created_at }}
                    </p>
               </div>
               <div class="tweet-comment">
                    <p >
                        {{ $tweet->tweet }}
                    </p>
               </div>
               <div class="tweet-photo">
                    <p >

                        <img src ="/{{ $tweet->photo }}" width="128" height="128">

                    </p>
               </div>

               <div class="comment-input">
                 <a href="{{route('comment.create', ['id' => $tweet->id])}}"  class="btn btn-success btn-sm">
                   コメントをする
                 </a>
                 <a href="{{route('comment.index', ['id' => $tweet->id])}}"  class="btn btn-success btn-sm">
                   コメントを見る
                 </a>
               </div>
                 <form method="post" action="{{ route('tweet.destroy', ['id' => $tweet->id]) }}">
                   {{ csrf_field() }}

                    <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("君は本当に削除するつもりかい？");'>
                 </form>

          </div>
            @endforeach

        </nav>
      </div>
      <div class="column col-md-2">
      お気に入り投稿者一覧
      <div>
          @foreach($likeusers as $likeuser)
            @auth
               @if($likeuser->likeuser_id === $user->id)
                {{ $likeuser->user->name }}
                <form method="post" action="{{ route('like.destroy', ['id' => $likeuser->id]) }}">
                  {{ csrf_field() }}

                   <input type="submit" value="お気に入りを外す" class="btn btn-outline-danger btn-sm" >
                </form>
              @endif
              @endauth


          @endforeach
      </div>
      </div>
    </div>
  </div>

</main>

@endsection
