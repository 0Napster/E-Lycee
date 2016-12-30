@extends('layouts.master')

@section('title', $title)

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    @if($post)
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="{{url('article',[$post->id])}}">{{$post->title}}</a></h2>
                    <p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
                </div>
                <div class="meta">
                    @if(!is_null($post->published_at))
                        <time class="published"
                              datetime="{{$post->published_at->format('d/m/Y')}}">{{$post->published_at->format('d/m/Y')}}</time>
                    @else
                        <time class="published"
                              datetime="{{$post->created_at->format('d/m/Y')}}">{{$post->created_at->format('d/m/Y')}}</time>
                    @endif
                    @if(!is_null($post->user->username))
                        <a href="#" class="author"><span class="name">{{$post->user->username}}</span><img
                                    src="images/avatar.jpg" alt=""/></a>
                    @else
                        <a href="#" class="author"><span class="name">Anonyme</span><img src="images/avatar.jpg"
                                                                                         alt=""/></a>
                    @endif
                </div>
            </header>
            @if(!is_null($post->url_thumbnail))
                <span class="image featured"><img src="{{$post->url_thumbnail}}" alt=""/></span>
            @else
                <p>pas d'images</p>
            @endif
            @if(!empty($post->content))
                <p>{{$post->content}} </p>
            @else
                <p>pas de contenu</p>
            @endif
            <footer>
                <ul class="stats">
                    <li><a href="#">General</a></li>
                    <li><a href="#" class="icon fa-heart">28</a></li>
                    <li><a href="#" class="icon fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
    @else
        <p>pas de d'article</p>
    @endif
@stop