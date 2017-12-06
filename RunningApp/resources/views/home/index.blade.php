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
        <form class="schedule" action="/updatefollowschedule" method="post">
            {{ csrf_field() }}
            <select name="scheduleId">
                @foreach( $schedules as $s)
                    <option @if(Auth::user()->followingSchedule == $s->id) selected="selected" @endif value="{{ $s->id }}">{{$s->name}}</option>

                @endforeach
            </select>
            <input type="submit" value="confirm">
        </form>
        <div class="home_main">
            <div class="home_main_inner small one">
                @if($recomendedDistanceYesterday <= 0)
                    <h3>Rest</h3>

                @else
                    <h4>{{$recomendedDistanceYesterday}} <h3>km</h3></h4>

                @endif
            </div>
            <div class="home_main_inner large two">
                @if($recomendedDistanceToday <= 0)
                <h2>Rest</h2>

                    @else
                    <h4>{{$recomendedDistanceToday}}</h4>
                    <h3>km</h3>
                @endif
            </div>
            <div class="home_main_inner small tree">
                @if($recomendedDistanceTomorrow <= 0)
                    <h3>Rest</h3>

                @else
                    <h4>{{$recomendedDistanceTomorrow}}</h4>
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