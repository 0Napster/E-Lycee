@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{url('login')}}" method="post">
                    <h3>Connectez-vous</h3>
                    <div class="form-group">
                        {{csrf_field()}}
                        <p><label for="email">Username</label>
                            <input type="text" name="username" value="{{old('username')}}" class="form-control">
                            @if($errors->has('username')) <span>{{$errors->first('username')}}</span>@endif
                        </p>
                        <p><label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                            @if($errors->has('password')) <span>{{$errors->first('password')}}</span>@endif
                        </p>
                        <p><input type="submit"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection