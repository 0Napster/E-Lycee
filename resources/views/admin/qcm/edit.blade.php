@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title}}
                        <small>different form elements</small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="POST"
                          action="{{url('admin/qcm/'.$qcm->id.'/update')}}"
                          enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <h2>Question</h2>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Titre<span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title" required="required"
                                       class="form-control col-md-7 col-xs-12" value="{{$qcm->title}}">
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Niveau<span--}}
                                        {{--class="required">*</span></label>--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                {{--<div id="status" class="btn-group" data-toggle="buttons">--}}
                                    {{--<label class="btn btn-{{check_radio_class($qcm->class_level, 'terminale')}}"--}}
                                           {{--data-toggle-class="btn-primary"--}}
                                           {{--data-toggle-passive-class="btn-default">--}}
                                        {{--<input {{check_radio_edit($qcm->status, 'terminale')}} type="radio"--}}
                                               {{--name="class_level" value="terminale">--}}
                                        {{--&nbsp; Terminale &nbsp;--}}
                                    {{--</label>--}}
                                    {{--<label class="btn btn-{{check_radio_class($qcm->class_level, 'premiere')}}"--}}
                                           {{--data-toggle-class="btn-primary"--}}
                                           {{--data-toggle-passive-class="btn-default">--}}
                                        {{--<input {{check_radio_edit($qcm->status, 'premiere')}} type="radio"--}}
                                               {{--name="class_level" value="premiere">--}}
                                        {{--Premiere--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Question<span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="content" class="resizable_textarea form-control" placeholder=""
                                          style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;">{{$qcm->content}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Statut<span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="status" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-{{check_radio_class($qcm->status, 'published')}}"
                                           data-toggle-class="btn-primary"
                                           data-toggle-passive-class="btn-default">
                                        <input {{check_radio_edit($qcm->status, 'published')}} type="radio"
                                               name="status" value="published">
                                        &nbsp; Publié &nbsp;
                                    </label>
                                    <label class="btn btn-{{check_radio_class($qcm->status, 'unpublished')}}"
                                           data-toggle-class="btn-primary"
                                           data-toggle-passive-class="btn-default">
                                        <input {{check_radio_edit($qcm->status, 'unpublished')}} type="radio"
                                               name="status" value="unpublished">
                                        Non Publié
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h2>Réponses</h2>
                        <?php $i = 0; ?>
                        @forelse($choices as $choice)
                            <?php
                            if($choice->question_id == $qcm->id ){
                            $i++; ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Reponse n°<?= $i; ?></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="content<?= $i; ?>" class="resizable_textarea form-control"
                                          placeholder=""
                                          style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;">{{$choice->content}}</textarea>
                                    <p><?php if ($choice->status == 'yes') echo '<span style="color: #188f38">Vraie</span>'; else echo '<span style="color: #ff1434">Fausse</span>';?></p>
                                </div>
                            </div>
                            <input type="hidden" value="{{$choice->id}}" name="choiceId<?= $i; ?>"/>
                            <?php } ?>
                        @empty
                        @endforelse
                        <input type="hidden" value="{{$i}}" name="nbChoice"/>
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
    <button class="btn btn-default source" onclick="new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">test notify
    </button>
@endsection
