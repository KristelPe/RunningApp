<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>WeAreRunners | @yield('title')</title>
</head>
<body>

@include('nav')
    <div class="container">
        @yield('content')
    </div>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/js/nav.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/badge.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>