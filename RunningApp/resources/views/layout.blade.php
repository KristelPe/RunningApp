<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">

    <link rel="stylesheet" href="../css/app.css">

    <title>@yield('title')</title>
</head>
<body>

@include('nav')
    <div class="container">


        @yield('content')
    </div>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/nav.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/switch_effect.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>