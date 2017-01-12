<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    @if(Auth::check())
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                           aria-expanded="false">
                            <img src="/assets/images/users/{{ Auth::user()->url_thumbnail }}"
                                 alt="">{{ Auth::user()->username }}
                            <span class=" fa fa-angle-down"></span>
                        </a>
                    @else
                        Utilisateur
                    @endif
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li><a href="{{url('/')}}">Retour au site</a></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> Déconnexion</a></li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{$qcmWaiting}}</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <div class="text">
                                    <strong><i class="fa fa-warning"></i>&nbsp;Vous avez des nouveaux questionnaires disponibles</strong>
                            </div>
                        </li>
                        <li>
                            @forelse($scores as $score)
                                <a href="{{url('student/qcm/'.$score->score_question_id.'/answer')}}" title="Cliquez pour répondre au questionnaire">

                                <span class="message">
                                        @if(!empty($score))
                                        @if($score->score_status_question == 'undone')
                                            <i class="fa fa-edit"></i>&nbsp;
                                            "{{$score->question_title}}" est
                                            <?php $date = new DateTime($score->question_updated_at); ?>
                                            disponible depuis le <span><?php echo $date->format('d/m/Y'); ?>
                                                à <?php echo $date->format('H:i'); ?></span>
                                        @else
                                        @endif
                                    @endif
                                </span>
                                </a>
                            @empty
                            @endforelse
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
