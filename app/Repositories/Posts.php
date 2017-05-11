<?php
namespace App\Repositories;

use App\Post;
use App\Redis;
/**
 *
 */
class Posts
{
  //Repos contains collections you would commonly use throughout the app,
  //in this case no need for defining what has already been provided by Eloquent

  //extract repetitve code throughout controller (but then why query scope)
  //also useful for testing


  protected $redis;  // pretend there's a class dependency... ??

  function __construct(Redis $redis)
  {


  $this->redis = $redis;


  }

  public function all()
  {
    //return all posts
    return Post::all();
  }
}



 ?>
