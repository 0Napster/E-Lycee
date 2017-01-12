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
                    <p>Administrer les articles</p>
                </div>
            </a>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{url('/admin/qcm')}}">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i></div>
                    <div class="count">{{$totalQcms}}</div>
                    <h3>QCMs</h3>
                    <p>Administrer les QCMs</p>
                </div>
            </a>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <div class="count">{{$totalComments}}</div>
                <h3>Commentaires</h3>
                <p><i class="fa fa-warning"></i>&nbsp;Les commentaires ne sont pas administrables</p>
            </div>
        </div>
    </div>
@endsection