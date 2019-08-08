<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use App\Likeuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TweetRequest;
use Illuminate\Support\Facades\Storage;

class TweetController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tweet $tweet)
    {
      $tweets = Tweet::orderBy('id', 'desc')->get();
      $likeusers = Likeuser::orderBy('id', 'desc')->get();

      $user = \Auth::user();


      return view('tweets/index',['tweets'=>$tweets,'likeusers'=>$likeusers,'user'=>$user]); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
          return view('tweets/create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $request)
    {
      $user = \Auth::user();
      $tweet = new Tweet();
      $tweet ->tweet = $request->tweet;

      $time = date("Ymdhis");
      $tweet ->photo = $request->photo->storeAs('public/post_images', $time.'_'.Auth::user()->id . '.jpg');


      if ($user) {
            $tweet ->user_id = $user->id;
        } else {
            $tweet ->user_id = "";
        }
        $tweet->save();
        return redirect()->route('tweet.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $tweet= Tweet::find($request->id);
        $tweet->delete();

        return redirect('/index');
    }
}
