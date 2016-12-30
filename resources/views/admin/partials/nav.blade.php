{{--<nav class="navbar navbar-inverse navbar-fixed-top">--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="navbar-header">--}}
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            {{--<a class="navbar-brand" href="{{url('/')}}"> Blog PHP</a>--}}
        {{--</div>--}}
        {{--<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" >--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li><a href="{{url('/post')}}"><i class="fa fa-line-chart" aria-hidden="true"></i>  Dashboard</a></li>--}}
                {{--<li><a href="{{url('/')}}"><i class="fa fa-step-backward" aria-hidden="true"></i>  Retour au site</a></li>--}}
                {{--<li><a href="{{url('/logout')}}"><button class='btn btn-danger btn-xs'><i class="fa fa-sign-out" aria-hidden="true"></i>  Se déconnecter</button></a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}

    <div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    @if(Auth::check())
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="" alt="">{{ Auth::user()->username }}
                            <span class=" fa fa-angle-down"></span>
                        </a>
                    @else
                        Utilisateur
                    @endif
                        @if(\Auth::user()->isAdmin())
                            admin !
                        @endif
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image"><img src="" alt="Profile Image"></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
