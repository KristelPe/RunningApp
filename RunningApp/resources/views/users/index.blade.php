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

                <p class="progress">lvl 0</p>

                <hr class="bar">

            </div>

        </div>

        <div class="stats">

            <h2> Personal statistics</h2>



            <ul>

                <li><div class="stat dist">Overall Distance</div><p>90.00 KM</p></li>

                <li><div class="stat fast">Fastest Sprint</div><p>12 KM/H</p></li>

                <li><div class="stat long">Longest Session</div><p>10 KM </p></li>

            </ul>


            <ul>

                <li><div class="stat dist">Overall Distance</div><p>90.00 KM</p></li>

                <li><div class="stat fast">Fastest Sprint</div><p>12 KM/H</p></li>

                <li><div class="stat long">Longest Session</div><p>10 KM </p></li>

            </ul>


        </div>

        <hr class="bar split">

        <h2> Most Recent Activities:</h2>

        <ul>

            @foreach($allActivity as $activity)


                    <li>

                        <div class="recent_activity">

                            <h3>{{ $activity->name }}</h3>

                            <p>Type: {{ $activity->type }}</p>

                            <p>Distance: {{ $activity->distance }}m</p>

                            <p>Duration: {{ $activity->moving_time }}</p>

                            <p>Likes: {{ $activity->kudos_count }}</p>

                            <p>Average speed: {{ $activity->average_speed }}</p>

                            <p>Max speed: {{ $activity->max_speed }}</p>

                        </div>

                        <hr class="bar">

                    </li>


        @endforeach
        </ul>
    </div>
@endsection