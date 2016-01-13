<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>L'invendable | @yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="@yield('keywords')" />
        {!! Html::style('css/bootstrap.css') !!}
        {!! Html::style('css/style.css') !!}
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
        {!! Html::style('img/favicon.png', array('rel' => 'shortcut icon', 'type' => 'image/x-icon')) !!}
        {!! Html::style('img/favicon.png', array('rel' => 'apple-touch-icon', 'type' => 'image/x-icon')) !!}
        
    </head>
    <body>
        @include('template.partials.header')
        @yield('body')
        @include('template.partials.footer')
        {!! Html::script('js/jquery-1.11.3.min.js') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
        @yield('javascripts')
    </body>
</html>