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
    @include('front.partials.header')

    <div id="main">
            @yield('content')
    </div>
    @section('sidebar')
        @include('front.partials.sidebar')
    @show
</div>
<script type="text/javascript" src="{{url('assets/js/app-front.min.js')}}"></script>
</body>
</html>