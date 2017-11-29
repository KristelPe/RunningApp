@extends('layout')

@section('title', 'Home')

@section('content')
    @parent

    @if( Auth::check())
        <head>
            <style>
                #fill{
                    width: {{$days}}%;
                }

                .home_main_inner:before {
                    top: {{$toRun}}%;
                }
            </style>
        </head>
        <div class="home_main">
            <h2>Today's goal</h2>
            <br>
            <div class="home_main_inner small">
                @if($goal <= 0)
                    <h3>Done</h3>

                @else
                    <h4>{{$recomendedDistance}} <h3>km</h3></h4>

                @endif
            </div>
            <div class="home_main_inner large">
                @if($goal <= 0)
                <h3>Done</h3>

                    @else
                    <h4>{{$recomendedDistanceToday}}</h4>
                    <h3>km</h3>
                @endif
            </div>
            <div class="home_main_inner small">
                @if($goal <= 0)
                    <h3>Done</h3>

                @else
                    <h4>{{$recomendedDistance}}</h4>
                    <h3>km</h3>
                @endif
            </div>
        </div>
        <div class="home_extra">
            @if($goal == 0)
                <p>Nothing else to do today!</p>

            @else
                <p>Run {{$goal}} more km to finish goal!!!</p>
            @endif
                <br>
            <div id="bar">
                <div id="fill"></div>
                <p id="days"><b>{{ $daysLeft }}</b> days left!</p>
            </div>
        </div>



    @else
        <div class="home_content">
            <a href="/login">
                <div class="home_main_inner strava_login">
                    <h1><b>Login</b> met <b>Strava</b></h1>
                    <img src="https://assets.ifttt.com/images/channels/1055884022/icons/monochrome_large.png" alt="strava logo">
                </div>
            </a>
        </div>
    @endif

@endsection