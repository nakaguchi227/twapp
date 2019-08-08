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
          {{$tweet->tweet}}
        </div>


       <div class="comment-content">
          @foreach($comments as $comment)

            @if($tweet->id === $comment->tweet_id)
              {{ $comment->comment }}
              <div class="comment-content-under">
              {{ $comment->user->name }}
              <span>　　</span>{{ $tweet->created_at }}
            </div>

            @endif

          @endforeach
       </div>


</main>
@endsection
