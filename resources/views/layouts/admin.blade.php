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
        @include('admin.partials.sidebar')
        @include('admin.partials.nav')
        <div class="right_col" role="main">
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{url('assets/js/app-back.min.js')}}"></script>
<script>
    //Ce script ne sera lancé que si l'on est sur la page de liste des articles ou des qcms
    if ($('.btn-pre-delete').length != 0) {
        $('.btn-pre-delete').bind('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let type = $(this).data('type');
            $('.btn-delete').bind('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $.ajax({
                    url: '{{url('admin/')}}/' + type + '/' + id + '/delete',
                    type: 'get',
                    data: {
                        _method: 'delete',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        new PNotify({
                            title: 'Succès',
                            text: 'Suppression réussi',
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        setInterval(function () {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function () {
                        new PNotify({
                            title: 'Erreur',
                            text: 'La suppression échoué',
                            type: 'warning',
                            styling: 'bootstrap3'
                        });
                    }
                })
            });
        });

    }
</script>
@include('general.messages')
</body>
</html>

