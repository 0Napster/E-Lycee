@extends('layouts.admin')
{{--@section('title', $title)--}}
@section('content')
    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{url('/admin/post')}}">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                <div class="count">{{$totalPosts}}</div>
                <h3>Articles</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
            </div>
            </a>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <div class="count">179</div>
                <h3>Commentaires</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                <div class="count">179</div>
                <h3>QCM</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
            </div>
        </div>
    </div>
@endsection