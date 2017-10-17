@extends('layout')

@section('title', 'User')
@section('css', 'profile.css')

@section('content')
    @parent


    <div class="profile_container">

        <div class="profile_header">

            <div class="pic_container">

                <img class="profile_picture" src={{ $userAvatarO }} >

            </div>

            <div class="main_details">

                <h1 class="username">{{ $userFirstName }}</h1>

                <p class="level">Rookie Runner</p>

                <p class="progress">lvl 3</p>

                <hr class="bar statbar">

            </div>

        </div>

        <hr class="bar">

        <div class="stats">

            <h2> Personal statistics</h2>



            <ul>

                <li><div class="stat dist">Overall Distance</div><p>{{ $totalDistance }} km</p></li>

                <li><div class="stat fast">Fastest Sprint</div><p>{{ $maxSpeed }} km/h</p></li>

                <li><div class="stat long">Longest Session</div><p>{{ $longestDistance }} km</p></li>

            </ul>


        </div>

        <hr class="bar split">

        <h2>Recent Activities</h2>

        <ul>

            @foreach($allActivity as $activity)


                    <li>

                        <div class="recent_activity">

                            <h3>{{ $activity->name }}</h3>

                            <p>Type: {{ $activity->type }}</p>

                            <p>Distance: {{ $activity->distance }}m</p>

                            <p>Duration: {{ $activity->moving_time }} seconds</p>

                            <p>Likes: {{ $activity->kudos_count }}</p>

                            <p>Average speed: {{ $activity->average_speed }} km/h</p>

                            <p>Max speed: {{ $activity->max_speed }} km/h</p>

                            <div class="image"><img src="" alt=""></div>

                        </div>

                    </li>

        @endforeach
        </ul>
    </div>

    <div class="spacer"></div>
@endsection