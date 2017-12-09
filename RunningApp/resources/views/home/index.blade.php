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
                @if($recomendedDistanceToday <= 0)
                    <h3>Rest</h3>

                @else
                    <h4>{{$recomendedDistanceToday}} <h3>km</h3></h4>

                @endif
            </div>
            <div class="home_main_inner large two">
                @if($recomendedDistanceToday <= 0)
                <h2>Rest</h2>

                    @else
                    <h4>{{$goalThisWeek}}</h4>
                    <h3>km</h3>
                @endif
            </div>
        </div>
        <div class="home_extra">
            <p>Run {{$goalWeek}} more km this week to finish your weekly goal!</p>
            @if($goalToday == 0)
                <p>Nothing else to do today!</p>
            @else

                <p>Run {{$goalToday}} more km to finish your goal today!</p>
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