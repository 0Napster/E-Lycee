@extends('layouts.student')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Vos QCMs
                <small>Liste des QCMs de votre classe</small>
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
                    <h2>QCMs</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <!-- start qcm list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>Titre du QCM</th>
                            <th>Votre résultat</th>
                            <th>Status</th>
                            <th style="width: 20%">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($scores as $score)
                            <?php $userRole = Auth::user()->role;
                            ?>
                            <tr>
                                <td>
                                    <a<?php if($score->score_status_question == 'undone') { ?>
                                            href="{{url('student/qcm/'.$score->score_question_id.'/answer')}}"
                                    style="text-decoration: underline;"<?php }?>>{{$score->question_title}}</a>
                                </td>
                                <td>
                                    <?php if($score->score_status_question == 'done') { ?>
                                    <a><?php if ($score->score_note >= 1) echo '<i class="fa fa-check" style="color: #1a8e2e" aria-hidden="true">&nbsp; 100% de réussite</i>'; elseif ($score->score_note == 0) echo '<i class="fa fa-times" style="color: #ff1434" aria-hidden="true">&nbsp;' . $score->score_note . '% de réussite</i>';
                                        else echo '<i class="fa fa-times" style="color: #183ab6" aria-hidden="true">&nbsp; ' . ($score->score_note) * 100 . '% de réussite</i>'; ?></a>
                                    <?php } else { ?>
                                    <a><i class="fa fa-question" style="color: #18308e" aria-hidden="true">&nbsp;À
                                            faire</i></a>
                                    <?php }?>
                                </td>
                                <td>
                                    <a><?php if ($score->score_status_question == 'done') echo '<i class="fa fa-check" style="color: #1a8e2e" aria-hidden="true">&nbsp;Fait</i>'; else echo '<i class="fa fa-question" style="color: #18308e" aria-hidden="true">&nbsp;À faire</i>' ?></a>
                                </td>
                                <td>
                                    <small>@if($score->score_status_question == 'done')
                                            <?php $date = new DateTime($score->score_updated_at); ?>
                                            Fait le <?php echo $date->format('d/m/Y'); ?> à <?php echo $date->format('H:i'); ?>
                                        @else
                                               <?php $date = new DateTime($score->question_updated_at); ?>
                                            Disponible depuis le <?php echo $date->format('d/m/Y'); ?> à <?php echo $date->format('H:i'); ?>
                                        @endif
                                    </small>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Il n'y a aucun qcm.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <!-- end qcm list -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Voulez-vous vraiment supprimer ce QCM ?</h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>
                        Close</a>
                    <a href="#" class="btn btn-danger btn-delete"><i
                                class="fa fa-trash-o"></i> Oui </a>
                </div>
            </div>
        </div>
    </div>
@endsection