@extends('layouts.master')

@section('content')
<h1>{{ $posts->count() }} correspondant à votre recherche :</h1>

    @foreach($posts as $post)
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="{{url('article',[$post->id])}}">{{$post->title}}</a></h2>
                    <p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
                </div>
                <div class="meta">
                    @if(!is_null($post->date))
                        <time class="published"
                              datetime="{{$post->date}}"> {{$post->date}}</time>
                    @else
                        <time class="published"
                              datetime="{{$post->created_at->format('d/m/Y')}}">{{$post->created_at->format('d/m/Y')}}</time>
                    @endif
                    @if(!is_null($post->user->username))
                        <a href="#" class="author"><span class="name">{{$post->user->username}}</span><img
                                    src="/assets/images/users/{{ $post->user->url_thumbnail }}" alt=""/></a>
                    @else
                        <a href="#" class="author"><span class="name">Anonyme</span><img src=""
                                                                                         alt=""/></a>
                    @endif
                </div>
            </header>
            @if(!is_null($post->url_thumbnail))
                <span class="image featured"><img src="/assets/images/posts/{{ $post->url_thumbnail }}" alt=""/></span>
            @else
                <p>Pas d'image</p>
            @endif
            @if(!empty($post->content))
                <p>{{$post->content}} </p>
            @else
                <p>Pas de contenu</p>
            @endif
            <footer>
                <ul class="stats">
                    <li><a href="#">General</a></li>
                    <li><a href="#" class="icon fa-heart">28</a></li>
                    <li><a href="#" class="icon fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
    @endforeach
    <!-- Pagination -->
    {!! $posts->render() !!}
@endsection