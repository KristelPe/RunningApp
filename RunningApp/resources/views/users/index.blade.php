@extends('layout')

@section('title', 'User')
@section('css', 'profile.css')

@section('content')
    @parent


    <div class="profile_container">

        <div class="profile_header">

            <div class="main_details">

                <h1 class="username">{{ $userFirstName }}</h1>

                <p class="level">Rookie Runner</p>

                <p class="progress">lvl 3</p>

                <hr class="bar statbar">

            </div>

        </div>



        <div class="stats">

            <hr class="bar">

            <h3>My Stats</h3>

            <ul>

                <li><div class="stat dist">Overall Distance</div><p>{{ $totalDistance }} km</p></li>

                <li><div class="stat fast">Fastest Sprint</div><p>{{ $maxSpeed }} km/h</p></li>

                <li><div class="stat long">Longest Session</div><p>{{ $longestDistance }} km</p></li>

            </ul>

        </div>



        <div class="activity_container">

            <hr class="bar">

            <h3 class="recentac">Recent Activity</h3>

            <ul>

                @foreach($allActivity as $activity)


                        <li>

                            <div class="recent_activity">

                                <h3>{{ $activity->name }}</h3>

                                <p>Distance: <span class="data">{{ $activity->distance }} m </span></p>

                                <p>Duration: <span class="data"> {{ $activity->moving_time }} seconds </span></p>

                                <p>Average speed: <span class="data">{{ $activity->average_speed }} km/h </span></p>

                                <p>Max speed: <span class="data">{{ $activity->max_speed }} km/h </span></p>

                                <div class="image"><img src="" alt=""></div>

                            </div>

                        </li>

            @endforeach
            </ul>



        </div>

        <hr class="bar none>

    </div>
@endsection