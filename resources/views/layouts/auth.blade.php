<!DOCTYPE HTML>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>ELycée.Lab- @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="viewport" content="height=device-height">
    <!-- CSS -->
    <link rel="stylesheet" href="{{url('assets/css/app-back.min.css')}}" media="all">
</head>
<body class="login" cz-shortcut-listen="true">
<div>
    @yield('content')
</div>
</body>