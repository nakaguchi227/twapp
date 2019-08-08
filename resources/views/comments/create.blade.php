@extends('layout')

@section('content')

<main>
  <div class="container">
    <div class="row">

      <div class="col col-md-2">
      </div>
      <div class="col col-md-6">
        <nav class="panel panel-default">
        <div class="comment-head">
          {{$tweet->tweet}}
        </div>

          <form action="{{ route('comment.store', ['id' => $tweet->id]) }}" method="post" >
          <div class="panel-body">
          </div>
            @csrf
              <div class='form-group'>
                <label for="comment">コメント入力</label>
                  <input type="text" class="form-control" name="comment" id="comment"  />
             </div>

             <button type="submit" class="btn btn-success">コメントをする</button>
          </form>



        </nav>
      </div>

    </div>
  </div>
</main>
@endsection
