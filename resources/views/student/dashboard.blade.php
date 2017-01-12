@extends('layouts.student')
{{--@section('title', $title)--}}
@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php
            $pointsCount = 0;
            $maxPointsCount = 0;
            $potentialCount = 0;
            $userId = Auth::user()->id;
            foreach ($scores as $score) {
                if ($score->user_id == $userId ) {
                    if($score->status_question == 'done'){
                        $maxPointsCount++;
                        $potentialCount++;
                        $pointsCount += $score->note;
                    }else{
                        $potentialCount++;
                    }
                }
            }
            ?>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Vos résultats</h2>
                    <div class="clearfix"></div>
                </div>
                <br/>
                <h4><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;Score&nbsp;:&nbsp;<?=$pointsCount ?>&nbsp;points
                    sur&nbsp;<?=$maxPointsCount ?>
                </h4>
                <br/>
                <h4><i class="fa fa-check-square-o"></i>&nbsp;Vous avez répondu à&nbsp;<?=$maxPointsCount ?>&nbsp;QCMs sur&nbsp;<?=$potentialCount ?>
                </h4>
                <br/>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection