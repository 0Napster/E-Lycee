<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('/admin')}}" class="site_title"><i class="fa fa-graduation-cap"></i> <span>E-lycée</span></a>
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
                    <li class="active"><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: block;">
                            <li><a href="{{url('/admin')}}">Dashboard</a></li>
                            <li><a href="{{url('/')}}">Retour au site</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/admin/post')}}">Listes des articles</a></li>
                            <li><a href="{{url('/admin/post/create')}}">Création d'un article</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
</div>
{{--<ul>--}}
{{--<li>--}}
{{--<span style="color:#fff;margin-left:20px;" >--}}
{{--<i class="fa fa-user fa-5x" aria-hidden="true"></i><br>--}}
{{--<span class="text-center" style="margin-left:40px;">{{(\Auth::user() ? \Auth::user()->name : '')}}</span>--}}
{{--</span>--}}
{{--</li>--}}
{{--<li  class="{{ (\Request::route()->getName() == 'post.index') ? 'active' : '' }}">--}}
{{--<a href="/post" >Dashboard</a>--}}
{{--</li>--}}
{{--<li class="{{ (\Request::route()->getName() == 'post.create') ? 'active' : '' }}">--}}
{{--<a href="{{url('/post/create')}}">Ajouter un article</a>--}}
{{--</li>--}}
{{--</ul>--}}

