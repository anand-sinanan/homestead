@extends ('layout')

@section ('content')
<div class="col-sm-8 blog-main">
  <div class="blog-post">


    <h2 class="blog-post-title">
    {{ $post->title }}
    </h2>
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>

    {{ $post->body }}
    <hr>

    <div class="comments">
      <ul class="list-group">
        @foreach ($post->comments as $comment)
          <strong>{{ $comment->created_at->diffForHumans() }} : </strong>
            <li class="list-group-item">{{ $comment->body }}</li>

        @endforeach
      </ul>

    </div>
  </div><!-- /.blog-post -->

<div class="card">
  <div class="card-block">
    <form action="/posts/{{ $post->id }}/comments" method="post">
      {{ csrf_field() }}
        <div class="form-group">
          <textarea id="body" name="body" placeholder="Your comment here." class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>
    </form>
    @include('layout.errors')
  </div>

</div>

</div>
@endsection
