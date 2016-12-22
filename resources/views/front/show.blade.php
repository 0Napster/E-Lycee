@extends('layouts.master')

@section('title', $title)

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    @if($post)
        <div class="article-details">
            <h1>
                <a href="{{url('article',[$post->id])}}" class="">{{$post->title}}</a>
                @if($post->score_avg)
                    <span class="pull-right notes">Note : {{$post->score_avg}}/20</span>
                @else
                    <span class="pull-right notes">Non noté</span>
                @endif
            </h1>
            @if(!is_null($post->user->username))
                <span class="well well-block" >Posté par {{$post->user->username}}
                    @else
                        <span class="well metadata">Posté par Anonyme
                            @endif
                            @if(!is_null($post->published_at))
                                le {{$post->published_at->format('d/m/Y')}}</span>
                        @else
                            le {{$post->created_at->format('d/m/Y')}}</span>
            @endif
            <hr>
            <div class="row">
                <div class="col-md-12">
                    @if(!is_null($post->url_thumbnail))
                        <div class='img-post'>
                            <img class="img img-responsive" src="{{$post->url_thumbnail}}">
                        </div>
                    @else
                        <p>pas d'images</p>
                    @endif
                    <div class='post-content'>
                        @if(!empty($post->content))
                            <hr>
                            <p class='text-justify '>{{$post->content}} </p>
                        @else
                            <p>pas de contenu</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>pas de d'article</p>
    @endif
@stop