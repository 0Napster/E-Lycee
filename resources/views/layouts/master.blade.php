<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <title>Blog PHP- @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/app-front.min.css')}}" media="all">
    @yield('head')
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">
    {{--@include('front.partials.nav')--}}
    @include('front.partials.header')

    <div id="main">
            @yield('content')
    </div>
    @section('sidebar')
        @include('front.partials.sidebar')
    @show
    {{--@include('front.partials.footer')--}}
</div>

{{--<div id="main" role="main" class="container">--}}
    {{--<div class="content col-md-9 col-lg-9 col-xs-12 col-sm-12">--}}
        {{--@yield('content')--}}
    {{--</div>--}}
    {{--<div class="sidebar-front col-md-3 hidden-xs hidden-sm">--}}
        {{--@section('sidebar')--}}
            {{--@include('front.partials.sidebar')--}}
        {{--@show--}}
    {{--</div>--}}
{{--</div>--}}

<script type="text/javascript" src="{{url('assets/js/app-front.min.js')}}"></script>
</body>
</html>