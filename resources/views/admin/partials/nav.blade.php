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
                        <li><a href="{{url('/')}}">Retour au site</a></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
