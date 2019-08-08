<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use App\Likeuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TweetRequest;
use App\Http\Requests\LikeuserRequest;
use Illuminate\Support\Facades\Storage;

class LikeuserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth')->except(['index']);
  }

  public function store(LikeuserRequest $request,$id)
  {
    $user = \Auth::user();
    $likeuser = new Likeuser();
    $current_user = User::find($id);

    $likeuser ->user_id = $current_user->id;

    if ($user) {
          $likeuser ->likeuser_id = $user->id;
      } else {
          $likeuser ->likeuser_id = "";
      }
      $likeuser -> save();
      return redirect()->route('tweet.index');
      //
  }



    public function destroy($id,Request $request)
    {
        $likeuser= likeuser::find($request->id);
        $likeuser->delete();

        return redirect('/index');
    }

    //
}
