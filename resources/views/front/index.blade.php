@extends('layouts.master')

{{--@section('title', $title)--}}

@section('content')

    @include('general.messages')


    <div class="wrapper-article">
        {{--<div class='text-center'>{{ $posts->links() }}</div>--}}
        <div class="row">
            @forelse($posts as $post)
                <div class="col-md-6">
                    <a href="/article/{{$post->id}}"><h2 class='text-left title'>{{$post->title}}</h2></a>
                    <span class="metadata">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                        @if(!is_null($post->published_at))
                            {{$post->published_at->format('d/m/Y')}}
                        @else
                            {{$post->created_at->format('d/m/Y')}}
                        @endif
                        <div class="pull-right">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        @if(!is_null($post->user->username))
                            <b class='auteur'>{{$post->user->username}}</b>
                        @else
                            Aucun auteur
                        @endif
                        </div>
                        <br>
                    </span>


                    @if(!is_null($post->url_thumbnail))
                        <div class='img-post'>
                            <img class="img img-responsive" src="{{$post->url_thumbnail}}">
                        </div>
                    @else
                        <p>pas d'images</p>
                    @endif

                    @if(!empty($post->content))
                        <p class='text-justify well post-content'>{{($post->abstract)}}
                            ...
                            <a href="/article/{{$post->id}}">
                                <button class='btn btn-primary pull-right btn-xs btn-more'>Lire la suite</button>
                            </a>
                        </p>
                    @else
                        <p>pas de contenu</p>
                    @endif

                    @if(!empty($post->score_avg))
                        <span class="note-xs margin-sides">Note : {{$post->score_avg}} / 20 ({{$post->rate}}
                            vote(s))</span>
                    @else
                        <span class="note-xs margin-sides">Note :Aucun ({{$post->rate}} vote(s))</span>
                    @endif

                    {{--<span class="margin-sides">--}}
            {{--@if(!is_null($post->category))--}}
                            {{--<i class="fa fa-list" aria-hidden="true"></i> Catégorie:--}}
                            {{--<span>{{$post->category->title}}</span>--}}
                        {{--@else--}}
                            {{--<i class="fa fa-list" aria-hidden="true"></i> Catégorie : <span>Non Catégorisé</span>--}}
                        {{--@endif--}}
            {{--</span>--}}

                    <hr>
                </div>
            @empty
            @endforelse
        </div>
    </div>

@endsection