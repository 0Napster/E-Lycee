@if(Session::has('messageFront'))
    <p>{{Session::get('messageFront')}}</p>
@else
    <script>
        var title = '{{Session::get('title')}}';
        var message = '{{Session::get('message')}}';
        var type = '{{Session::get('type')}}';
        createNewNotify(title, message, type);
    </script>
@endif