@extends('layouts.master')

@section('content')
    <h1>Contactez-nous !</h1>
    <article class="post">
        <form id="form">
            <input id="name" type="text" placeholder="Nom">
            <input id="email" type="text" placeholder="E-mail">
            <textarea id="message" type="text" placeholder="Message"></textarea>
            <input id="submit" type="submit" value="Envoyer">
        </form>
    </article>
@endsection