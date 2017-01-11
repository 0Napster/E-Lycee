@extends('layouts.master')

@section('title', $title)

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    @if($post)
        @include('general.messages')
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
            @if($post->comments)
                <h3>{{$post->comments->count()}} commentaire(s)</h3>
            @else
                0 commentaire
            @endif
            @forelse($post->comments as $comment)
                <div class="single-comment">
                    <h4>{{$comment->title}}
                        <span>le</span>
                        @if($comment->date)
                            {{$comment->date->format('d/m/Y')}}
                        @endif
                    </h4>
                    <div class="txt-comment">
                        <p>{{$comment->content}}</p>
                    </div>
                </div>
            @empty
                <p>0 commentaire </p>
            @endforelse
            <div class="form-comment">
                <h3>Ajouter un commentaire</h3>
                <form action="{{url('comment')}}" method="POST" class="col-md-6">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="title" id="nom" placeholder="Pseudo" class="form-control" value="{{old('title')}}" />
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="content" placeholder="Votre message"
                                  class="form-control" value="{{old('content')}}" ></textarea>
                    </div>
                    <input type="hidden" name="date" value="{{date('Y-m-d H:i:s')}}">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </article>
    @else
        <p>pas de d'article</p>
    @endif
@stop

@section('sidebar')

@stop