@extends('layouts.admin')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Les Articles <small>listes des artciles à administrer</small></h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Projects</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <p>Publié ({{$total['published']}}), Non Publié ({{$total['unpublished']}}) </p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 20%">Nom de l'article</th>
                            <th>Auteur</th>
                            <th>Project Progress</th>
                            <th>Status</th>
                            <th style="width: 20%">Édition</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>
                                <a>{{$post->title}}</a>
                                <br>
                                <small>Created  @if(!is_null($post->published_at))
                                        le {{$post->published_at->format('d/m/Y')}}
                                    @else
                                        le {{$post->created_at->format('d/m/Y')}}
                                    @endif
                                </small>
                            </td>
                            <td>
                                <a href="#">{{$post->user->username}}</a>
                            </td>
                            <td class="project_progress">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57" aria-valuenow="56" style="width: 57%;"></div>
                                </div>
                                <small>57% Complete</small>
                            </td>
                            <td>@if(($post->status) == "trashed")
                                    <button type="button" class="btn btn-danger btn-xs">{{$post->status}}</button>
                                @elseif (($post->status) == "unpublished")
                                    <button type="button" class="btn btn-warning btn-xs">{{$post->status}}</button>
                                    @else
                                <button type="button" class="btn btn-success btn-xs">{{$post->status}}</button>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td>Il n'y a aucun article à administrer.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <!-- end project list -->
                </div>
            </div>
        </div>
    </div>
@endsection