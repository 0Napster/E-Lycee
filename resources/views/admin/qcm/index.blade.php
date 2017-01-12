@extends('layouts.admin')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Les QCMs
                <small>Liste des QCMs à administrer</small>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>QCMs</h2>
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

                    <!-- start qcm list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 20%">Nom du QCM</th>
                            <th>Niveau</th>
                            <th>Status</th>
                            <th style="width: 20%">Édition</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($qcms as $qcm)
                            <tr>
                                <td>{{$qcm->id}}</td>
                                <td>
                                    <a>{{$qcm->title}}</a>
                                    <br>
                                    <small>Créé le : @if(!is_null($qcm->created_at))
                                            le {{$qcm->created_at->format('d/m/Y')}}
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    <a href="#">{{ucfirst($qcm->class_level)}}</a>
                                </td>
                                <td>@if (($qcm->status) == "unpublished")
                                        <button type="button" class="btn btn-warning btn-xs">{{$qcm->status}}</button>
                                    @else
                                        <button type="button" class="btn btn-success btn-xs">{{$qcm->status}}</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/admin/qcm/'.$qcm->id.'/edit')}}" class="btn btn-info btn-xs"><i
                                                class="fa fa-pencil"></i> Edit </a>
                                    <button type="button" class="btn btn-danger btn-xs btn-pre-delete"
                                            data-id="{{$qcm->id}}" data-type="qcm"
                                            data-toggle="modal" data-target=".bs-example-modal-lg"><i
                                                class="fa fa-trash-o"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Il n'y a aucun qcm à administrer.</td>
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