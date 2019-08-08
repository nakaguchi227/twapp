<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Tweet;
use App\Http\Requests\TweetRequest;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tweet = Tweet::find($id);
        $comments = Comment::orderBy('id', 'desc')->get();

        return view('comments/index',['tweet'=>$tweet,'comments'=>$comments]); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $tweet = Tweet::find($id);

        return view('comments/create',['tweet'=>$tweet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,CommentRequest $request,Tweet $tweet)
    {
          $user = \Auth::user();
          $tweet = Tweet::find($id);
          $comment = new Comment();
          $comment ->comment = $request->comment;
          $comment ->tweet_id = $tweet->id;

          if ($user) {
                $comment ->user_id = $user->id;
            } else {
                $comment ->user_id = "";
            }
            $comment->save();
            return redirect()->route('tweet.index');
            //
        }




    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
