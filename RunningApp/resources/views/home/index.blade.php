@extends('layout')

@section('title', 'Home')

@section('content')
    @parent

    @if( Auth::check())
        <head>
            <style>
                p:not(.days){
                    margin-left: 2.5em;
                    color: rgba(38, 38, 38, 0.67);
                }

                h2{
                    margin-left: 1.5em;
                }

                #main{
                    text-align: left
                }

                h3{
                    font-size: 5em;
                    line-height: 2.1em;
                    margin-left: 0.05em;
                }

                h4{
                    font-size: 8em;
                    margin-right: 0.05em;
                }


                #bar{
                    margin: auto;
                    width: 80vw;
                    height: 2.3em;
                    text-align: center;
                    border: 2pt solid white;
                    box-shadow: 0px 0px 20px lightgray;
                }

                #fill{
                    background-color: #F18948;
                    width: {{$days}}%;
                    height: 2.3em;
                    box-shadow: inset 0px 0px 30px rgba(255, 187, 83, 0.36);
                }

                .days{
                    margin-top: -1.45em;
                    font-size: 1.3em;
                }

                .inner{
                    display: flex;
                    flex-direction: row;
                    text-align: center;
                    margin: auto;
                    width: 11.5em;
                    background-color: rgba(245, 245, 245, 0.46);
                    border-radius: 50%;
                    height: 11.5em;
                    padding: 2em;
                    margin-bottom: 4em;
                    border: 3pt solid white;
                    box-shadow: 0px 0px 20px lightgray;
                }

                .inner *{
                    margin-top: 0.125em;
                }

                .inner  {
                    position: relative;
                    z-index: 9;
                    overflow: hidden;
                }

                .inner:before {
                    content: "";
                    position: absolute;
                    z-index: -1;
                    top: {{$toRun}}%;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    background: #cecece;
                    box-shadow: inset 0px 0px 40px white;
                    border-top: 1pt solid #e9e9e9;
                }
            </style>
        </head>
        <div id="main">
            <h2>Today's goal</h2>
            <br>
            <div class="inner">
                <h4>{{$recomendedDistance}}</h4>
                <h3>km</h3>
            </div>
        </div>
        <div id="extra">
            <p>Run {{$goal}} more km to finish goal!!!</p>
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