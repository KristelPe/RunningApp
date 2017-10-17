<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/@yield('css')">
    <title>@yield('title')</title>
</head>
<body>
@include('nav')
    <div class="container">
        @yield('content')
    </div>
</body>
</html>