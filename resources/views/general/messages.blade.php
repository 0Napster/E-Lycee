@if(Session::has('message'))
        @if(is_array(Session::get('message')))
            <ul>
                @foreach(Session::get('message') as $message)

                @endforeach
            </ul>
        @else
            <script>
                var title = '{{Session::get('title')}}';
                var message = '{{Session::get('message')}}';
                var type = '{{Session::get('type')}}';
                createNewNotify(title, message, type);
            </script>
        @endif
@endif