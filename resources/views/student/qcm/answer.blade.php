@extends('layouts.student')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Répondre au QCM
                <small>Liste des réponses proposées pour le QCM</small>
            </h3>
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

                    <h2>{{$qcm->title}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="POST"
                          action="{{url('student/qcm/'.$qcm->id.'/update')}}"
                          enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <h2>Question : {{$qcm->content}}</h2>
                        @forelse($choices as $choice)
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="title">{{$choice->choice_content}}
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="choice{{$choice->choice_id}}"
                                               class="onoffswitch-checkbox" id="choice{{$choice->choice_id}}">
                                        <label class="onoffswitch-label" for="choice{{$choice->choice_id}}">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection