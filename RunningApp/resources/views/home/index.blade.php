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

                .inner:before {
                    top: {{$toRun}}%;
                }
            </style>
        </head>
        <div id="main">
            <h2>Today's goal</h2>
            <br>
            <div class="inner">
                @if($goal == 0)
                <h3>Done</h3>

                    @else
                    <h4>{{$recomendedDistance}}</h4>
                    <h3>km</h3>
                @endif
            </div>
        </div>
        <div id="extra">
            @if($goal == 0)
                <p>Nothing else to do today!</p>

            @else
                <p>Run {{$goal}} more km to finish goal!!!</p>
                @endif
                <br>
            <div id="bar">
                <div id="fill"></div>
                <p class="days"><b>{{ $daysLeft }}</b> days left!</p>
            </div>
        </div>



    @else
        <div class="home_content">
            <a href="/login"><img src="/img/strava.jpg" alt=""><p>Log in to start running!</p></a>
        </div>
    @endif

@endsection