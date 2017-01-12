<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('/student')}}" class="site_title"><i class="fa fa-graduation-cap"></i> <span>E-lycée</span></a>
        </div>
        <div class="profile">
            <div class="profile_pic">
                <img src="/assets/images/users/{{ Auth::user()->url_thumbnail }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenue,</span>
                @if(Auth::check())
                    <h2>{{ Auth::user()->username }}</h2>
                @else
                    Utilisateur
                @endif

            </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section active">
                <h3>General</h3>
                <ul class="nav side-menu" style="">
                    <li class="active"><a><i class="fa fa-home"></i> Général <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: block;">
                            <li><a href="{{url('/student')}}">Dashboard</a></li>
                            <li><a href="{{url('/')}}">Retour au site</a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="{{url('/student/qcm')}}"><i class="fa fa-edit"></i> QCMs</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


