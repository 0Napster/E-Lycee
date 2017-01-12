@extends('layouts.admin')
@section('content')
    <?php
    if(!empty($nbChoice)){
    $nbChoice = intval($nbChoice);
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Réponse pour la question :&nbsp;{{$title}}
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
                          action="{{url('admin/choices/store')}}"
                          enctype="multipart/form-data">
                        {{method_field('POST')}}
                        {{csrf_field()}}
                        <h2>Réponses</h2>
                        @for($i = 0; $i < $nbChoice; $i++)
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="title">Réponse n° <?php echo $i + 1; ?></label>
                                <div class="col-md-6 col-sm-6 col-xs-9">
                                    <textarea type="text" id="content<?php echo $i + 1; ?>" name="content<?php echo $i + 1; ?>" required="required"
                                           class="form-control resizable_textarea col-md-4 col-xs-12"></textarea>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-2">
                                    <select class="form-control" name="status<?php echo $i + 1; ?>">
                                        <option value="no">Fausse</option>
                                        <option value="yes">Vraie</option>
                                    </select>
                                </div>
                            </div>
                        @endfor
                        <input type="hidden" value="{{$nbChoice}}" name="nbChoice"/>
                        <input type="hidden" value="{{$qcmId}}" name="question_id"/>
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
    <?php } ?>
@endsection