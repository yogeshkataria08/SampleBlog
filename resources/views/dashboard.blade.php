@extends("layouts.layout")

@section("title", "Home")

@section("content")

<div class="wrapper">
  <!-- Add Create button -->
  @foreach ($posts as $post)
      <div class="post">
          <h2>{{ $post->title }}</h2>
          <p>{{ $post->content }}</p>
          <a href="{{ route('post.show', $post->id) }}" class="read-more">Read more</a>
      </div>
  @endforeach

  <div class="sidebar">
    <h2>Recent Posts</h2>
    <ul>
    @foreach ($recentPosts as $recentPost)
        <li><a href="{{ route('post.show', $recentPost->id) }}?from=home">{{ $recentPost->title }}</a></li>
    @endforeach
    </ul>
  </div>
</div>

@endsection
