<?php

namespace App\Http\Controllers;

use \App\Post as Post;
//use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function _construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){


      //Feels much this should feel like much
      // $posts = Post::latest();
      //
      // if($month = request('month')) {
      //   $posts->whereMonth('created_at', Carbon::parse($month)->month);
      // }
      //
      // if($year = request('year')) {
      //   $posts->whereYear('created_at', $year);
      // }
      //
      // $posts = $posts->get();

      //instead let it be handled in query scope, technically do same for archives

      // repo example
      //$posts (new \App\Repositories\Posts)->all();
      // but using reflections can change any controller function to take in Repositories
      // use App\Repositories\Posts at top
      // change index() to index(Posts $posts)
      // then replace below with Repo: 
      // $posts = $posts->all();
      $posts = Post::latest()
                    ->filter(request(['month', 'year']))
                    ->get();



      //return $archives;

       return view('posts.index', compact('posts'));
    }

    public function show(Post $post){


      return view('posts.show', compact('post'));
    }

    public function create(){
      return view('posts.create');
    }

    public function store(){

      // Alternative (but unprotected, advised to create a parent Model class
      // to use fillable or guarded...)

      // Post::create([
      //   'title' => request('title'),
      //   'body' => request('body')
      // ])


      //Create new post using request data : dd(request()->all());
      // $post = new Post;

      // $post->title = request('title');
      // $post->body = request('body');

      // //Save to database
      // $post->save();
      $this->validate(request(), [
        'title' => 'required',
        'body' => 'required'

      ]);

      auth()->user()->publish(
          new Post(request(['title', 'body']))
      );

      // Post::create(request([
      //   'title' => request('title'),
      //   'body' => request('body'),
      //   'user_id' = auth()->id()
      // ]));

      // Redirect to home / index
      return redirect('/posts/index');
    }
}
