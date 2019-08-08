@extends('layout')

@section('content')

<main>
  <div class="container">
    <div class="row">

      <div class="col col-md-2">
      </div>
      <div class="col col-md-6">
        <nav class="panel panel-default">

          <form action="{{ route('tweet.store') }}" method="post" enctype="multipart/form-data">
          <div class="panel-body">
          </div>
            @csrf
              <div class='form-group'>
                <label for="tweet">つぶやき</label>
                  <input type="text" class="form-control" name="tweet" id="title"  />
             </div>
              <div class='form-group'>
                <label for="photo">写真</label>
                  <input type="file" class="form-control" name="photo" id="photo"  />
             </div>

             <button type="submit" class="btn btn-primary">新規投稿</button>
          </form>



        </nav>
      </div>

    </div>
  </div>
</main>
@endsection
