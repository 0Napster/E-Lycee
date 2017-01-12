<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog PHP - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">--}}
    <link rel="stylesheet" href="{{url('assets/css/app-back.min.css')}}" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('head')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('student.partials.sidebar')
        @include('student.partials.nav')
        <div class="right_col" role="main">
            @yield('content')
        </div>
        @include('student.partials.footer')
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{url('assets/js/app-back.min.js')}}"></script>
@include('general.messages')
</body>
</html>

