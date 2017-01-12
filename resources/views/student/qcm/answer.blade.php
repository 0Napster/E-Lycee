@extends('layouts.student')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Répondre au QCM
                <small>Liste des réponses proposées pour le QCM</small>
            </h3>
        </div>
    </div>
    <?php
    $isAuthToanswer = false;
    foreach ($scores as $score) {
    if ($score->score_status_question == 'undone' && $score->score_question_id == $qcm->id) {
    $isAuthToanswer = true;?>

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
                                <label class="control-label col-md-8 col-sm-8 col-xs-12"
                                       for="title">{{$choice->choice_content}}
                                </label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
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
                        <input type="hidden" value="<?php echo Auth::user()->id; ?>" name="user_id"/>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php }

    }
    if(!$isAuthToanswer) { ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Désolé vous ne pouvez pas accéder à ce QCM</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
@endsection