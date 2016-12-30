@extends('layouts.auth')

@section('content')
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{url('login')}}" method="post">
                    {{csrf_field()}}
                    <h1>Connectez-vous</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}" required="required">
                        @if($errors->has('username')) <span>{{$errors->first('username')}}</span>@endif
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                        @if($errors->has('password')) <span>{{$errors->first('password')}}</span>@endif
                    </div>
                    <div>
                        <input class="btn btn-default submit" type="submit"/>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <br>
                        <div>
                            <h1><i class="fa fa-paw"></i> E-Lycee</h1>
                            <p>©2016 All Rights Reserved. E-lycee is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection

