@extends('layout')

@section('content')

<div class="col-sm-8 blog-main">

@if ( isset($posts) && (count($posts)>0) )
  @foreach ($posts as $post)
    @include ('posts.post')
  @endforeach
@else
  <h1>No posts to show.</h1>
@endif


  <nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
  </nav>

</div><!-- /.blog-main -->

@endsection
