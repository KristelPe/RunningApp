@extends('layout')

@section('title', 'User')
@section('css', 'profile.css')

@section('content')
    @parent


    <div class="profile_content">

        <div class="profile_header">

            <div class="profile_picture_layout" style="background-image:url('{{ Auth::user()->avatar_original }}')">
            </div>

            <div class="profile_details">
                <h1 class="usernameIndex">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h1>
                <p class="level">Rookie Runner</p>
                <p class="progress">Level: {{ Auth::user()->level }}</p>
            </div>
            <div class="recent_badges">
                {{--@foreach(Auth::user()->getLatestBadge($userId) as $b)
                        <div class="badge_container">
                            <img src="{{$b->image}}" alt="BadgeImage" class="badge_img">
                            <div class="badge_title"><p>{{$b->title}}</p></div>
                            <p class="level">Level {{$b->pivot->level}}</p>
                        </div>

                        <div class="badge_description" style="display: none">
                            <p>{{$b->description}}</p>
                            <p>{{$b->pivot->relevant_data}}</p>
                        </div>
                @endforeach--}}

            </div>
        </div>

        <div class="switch_button">
            <ul>
                <li class="switch_button_1" onclick="switchEffect(1)">Badges</li>
                <li class="switch_button_2" onclick="switchEffect(2)">Recent Activities</li>
            </ul>
        </div>

        <div class="stats switched_item_1">
{{--
            <h2 class="profile_stat_layout_h2"> Personal statistics</h2>

            <ul class="profile_stat_layout">

                <li><div class="stat dist">Overall Distance</div><p>{{ $totalDistance }} km</p></li>

                <li><div class="stat fast">Average Speed</div><p>{{ $avgSpeed }} km/h</p></li>

                <li><div class="stat long">Longest Session</div><p>{{ $longestDistance }} km</p></li>

            </ul>--}}
            <br>
          {{--Badges--}}
            @include('users.badges')
        </div>

        <div class="activities switched_item_2">
            <ul class="list_schedule">

                @foreach($allActivity as $activity)
                @if($activity->max_speed <= 2683200 && $activity->type != 'Ride')

                        <li>

                            <div class="recent_activity">

                                <h3>{{ $activity->name }}</h3>

                                <p class="data_activity">Type: {{ $activity->type }}</p>

                                <p class="data_activity">Distance: {{ $activity->distance }}m</p>

                                <p class="data_activity">Duration: {{ $activity->moving_time }} seconds</p>

                                <p class="data_activity">Likes: {{ $activity->kudos_count }}</p>

                                <p class="data_activity">Average speed: {{ $activity->average_speed }} km/h</p>

                                <p class="data_activity">Max speed: {{ $activity->max_speed }} km/h</p>

                                <div class="image"><img src="" alt=""></div>

                            </div>

                        </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>

    <script src="js/switch_effect.js" type="text/javascript" charset="utf-8"></script>
@endsection