<!-- resources/views/posts/show.blade.php -->

@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        @if ($previousPage == 'postlist')
            <a href="{{ route('post.index') }}" class="btn btn-primary">Go back to All Post Listings</a>
        @else
            <a href="{{ route('home') }}" class="btn btn-primary">Go back to Home</a>
        @endif
    </div>
@endsection
