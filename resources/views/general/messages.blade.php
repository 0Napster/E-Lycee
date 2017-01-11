@if(Session::has('messageFront'))
    <p>{{Session::get('messageFront')}}</p>
@elseif (Session::has('message'))
    <script>
        var title = '{{Session::get('title')}}';
        var message = '{{Session::get('message')}}';
        var type = '{{Session::get('type')}}';
        createNewNotify(title, message, type);
    </script>
@endif