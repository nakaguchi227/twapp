@extends('layout')

@section('content')


<main>
  <div class="container">
    <div class="row">

      <div class="col col-md-3">
      </div>
      <div class="col col-md-6">
        <nav class="panel panel-default">
        <div class="comment-head">
              {{ $user->name }}
              <form action="{{ route('like.store' ,['id' => $user->id]) }}" method="post" >
                  @csrf
                  <input type="submit" value="お気に入りにいれる" class="btn btn-outline-success btn-sm" >

              </form>


        </div>


              <div class="user-page-comments">
                @foreach($tweets as $tweet)
                  <div class="user-page-comments-content">
                    @if($tweet->user_id === $user->id)
                      {{ $tweet -> tweet }} <span>　　</span> {{ $tweet->created_at }}
                       <a href="{{route('comment.index', ['id' => $tweet->id])}}"  class="btn btn-success btn-sm">
                          コメント一覧
                        </a>
                    @endif
                  </div>

                @endforeach
              </div>





</main>
@endsection
