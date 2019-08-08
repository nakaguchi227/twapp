<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TweetRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth')->except(['index']);
  }

  public function index($id)
  {
    $user = User::find($id);
    $tweets = Tweet::orderBy('id', 'desc')->get();


      return view('users/index',['user'=>$user,'tweets'=>$tweets]); //
  }

  public function like($id)
  {
    $user = User::find($id);
    $tweets = Tweet::orderBy('id', 'desc')->get();


      return view('users/index',['user'=>$user,'tweets'=>$tweets]); //
  }


    //
}
