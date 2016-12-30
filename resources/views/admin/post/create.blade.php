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
                    <form class="form-horizontal form-label-left" method="POST" action="{{url('post')}}"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{$userId}}">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Titre <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" required="required"
                                       class="form-control col-md-7 col-xs-12" value="{{old('title')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Extrait <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="last-name" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contenu de l'article</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="resizable_textarea form-control" placeholder=""
                                          style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;">{{old('content')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="input-1" type="file" class="file">
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Statut</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary"
                                               data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male"
                                                   data-parsley-multiple="gender">
                                            &nbsp; Publié &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary"
                                               data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female"
                                                   data-parsley-multiple="gender">
                                            Non Publié
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date de publication <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12"
                                           required="required" type="text">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-danger">Annuler</button>
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
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });">test notify</button>
@endsection