@extends('template.skeleton')

@section('title')
Annonce en attente
@stop

@section('description')
Nous avons bien reçu votre annonce ! Elle sera validée dans les prochaines 24h
@stop

@section('keywords')
poster, annonce, réussi, bientôt, dans, la, journée
@stop

@section('body')
    <hr class="separator">
    <section class="container">
    <div class="row">
        <h1 class="head-title col-sm-offset-3 col-sm-7  text-center">{{ trans('messages.ads_success') }}</h1>
    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-7">
            <p>Votre annonce va être contrôlée dans les 24h, et vous recevrez un email de validation une fois votre annonce en ligne.</p>
            <p>A bientôt, sur L'invendable ! </p>
        <div>
    </div>

    </section>

@stop
