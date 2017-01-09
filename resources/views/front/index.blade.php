@extends('layouts.master')

{{--@section('title', $title)--}}

@section('content')
    @forelse($posts as $post)
        <!-- Post -->
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="/article/{{$post->id}}">{{$post->title}}</a></h2>
                    <p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
                </div>
                <div class="meta">
                    @if(!is_null($post->date))
                        <time class="published"
                              datetime="{{$post->date}}"> {{$post->date}}</time>
                    @else
                        <time class="published"
                              datetime="{{$post->created_at->format('d/m/Y')}}"> {{$post->created_at->format('d/m/Y')}}</time>
                    @endif
                    @if(!is_null($post->user->username))
                        <a href="#" class="author"><span class="name">{{$post->user->username}}</span><img
                                    src="/assets/images/users/{{ $post->user->url_thumbnail }}"
                                    alt=""/></a>
                    @else
                        <a href="#" class="author"><span class="name">Aucun auteur</span><img src="" alt=""/></a>
                    @endif
                </div>
            </header>
            @if(!is_null($post->url_thumbnail))
                <a href="/article/{{$post->id}}" class="image featured"><img
                            src="/assets/images/posts/{{ $post->url_thumbnail }}"
                            alt=""/></a>
            @else
                <a href="#" class="image featured"><img src="" alt=""/></a>
            @endif
            @if(!empty($post->content))
                <p>{{($post->abstract)}}...</p>
            @else
                <p>pas de contenu</p>
            @endif
            <footer>
                <ul class="actions">
                    <li><a href="/article/{{$post->id}}" class="button big">Continue Reading</a></li>
                </ul>
                <ul class="stats">
                    <li><a href="#">General</a></li>
                    <li><a href="#" class="icon fa-heart">28</a></li>
                    <li><a href="#" class="icon fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
    @empty
    @endforelse
    <!-- Pagination -->
    {{$posts->render()}}
@endsection