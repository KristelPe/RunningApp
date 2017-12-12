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
            @if($numberOfWeeksStart <= 0)
            <p>Training started this week!</p>
            @elseif($numberOfWeeksStart == 1)
                <p>Training started one week ago!</p>
            @else
                <p>Training started {{$numberOfWeeksStart}} weeks ago!</p>
            @endif

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
            <p>Run <b>{{$goalWeek}}</b> more km this week to finish your <b>weekly goal</b>!</p>
            @if($goalToday == 0)
                <p><b>Nothing</b> else to do <b>today</b>!</p>
            @else

                <p>Run <b>{{$goalToday}}</b> more km to finish your goal <b>today</b>!</p>
            @endif
                <br>
            <div id="bar">
                <div id="fill"></div>
                @if($weeksLeft == 1)
                <p id="days"><b>{{$weeksLeft}} week and {{ $fewDaysLeft }}</b> days left!</p>
                    @elseif($weeksLeft == 0 && $fewDaysLeft > 1)
                    <p id="days"><b>{{ $fewDaysLeft }}</b> days left!</p>
                    @elseif($fewDaysLeft == 1)
                    <p id="days"><b>{{ $fewDaysLeft }}</b> day left!</p>
                @elseif($fewDaysLeft == 0)
                    <p id="days"><b>Today is the BIG day!</b></p>
                    @else
                    <p id="days"><b>{{$weeksLeft}}</b> weeks and <b>{{ $fewDaysLeft }}</b> days left!</p>
                @endif
            </div>
        </div>

        <div>
            <h1>What is everyone doing?</h1>
            @foreach($recentActs as $act)



                <a href="/parcours/{{$act->id}}">
                    <h2>{{$act->name}}</h2>
                    <h3>by {{$act->getUser->firstName}}</h3>
                </a>

                @endforeach
        </div>



    @else
        <div class="home_content">
            <a href="/login" class="callToAction">
                <div class="home_main_inner strava_login">
                    <h1><b>Login</b> met <b>Strava</b></h1>
                    <img src="https://assets.ifttt.com/images/channels/1055884022/icons/monochrome_large.png" alt="strava logo">
                </div>
                <h1>Bereid je voor op de 10 miles!</h1>
                <h2>#WeAreRunners</h2>
            </a>
        </div>
    @endif

@endsection