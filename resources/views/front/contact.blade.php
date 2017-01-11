@extends('layouts.master')
@section('content')
    <h1>Contactez-nous !</h1>
    <article class="post">
        <form id="form" action="/send" method="post">
            {{method_field('POST')}}
            {{csrf_field()}}
            <input id="title" type="text" name="title" placeholder="Objet">
            <input id="name" type="text" name="name" placeholder="Nom">
            <input id="email" type="text" name="email" placeholder="E-mail">
            <textarea id="content" name="content" placeholder="Message"></textarea>
            <input id="submit" type="submit" value="Envoyer">
            @include('general.messages')
        </form>
    </article>
@endsection