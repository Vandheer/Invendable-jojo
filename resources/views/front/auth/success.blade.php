@extends('template.skeleton')

@section('title')
Inscription réussie
@stop

@section('description')
Inscription réussie ! N'attendez plus pour poster des annonces !
@stop

@section('keywords')
Inscription, réussie, bienvenue, dans, la, communauté, poster, annonces
@stop

@section('body')
    <hr class="separator">
    <section class="container">
    <div class="row">
        <h1 class="head-title col-sm-offset-3 col-sm-7  text-center">{{ trans('messages.register_success') }}</h1>
    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-7">
            <p>Bienvenue sur L'invendable, {{$user->first_name}} {{$user->last_name}}.</p>
            <p>Nous avons envoyé un mail de confirmation à cette adresse mail : {{$user->email}} qui vous permettra de valider votre compte</p>
            <p>À bientôt, sur L'invendable ! </p>
        <div>
    </div>

    </section>

@stop
