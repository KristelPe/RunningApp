@extends('layout')

@section('title', 'Parcours')
@section('css', 'parcours')

@section('content')
    @parent

    <div class="leaderboard_content">
        <div class="leaderboard">
            <ul class="overview">
                <li class="username"><h6>Username</h6></li>
                <li class="data"><h6>Total Time</h6></li>
            </ul>
        @foreach($leaderboards as $leaderboard)
                    @foreach($leaderboard->user as $user)
                        <ul class="user_leaderboard">
                            <li class="image"><img src="{{$user->avatar_original}}" class="small_avatar" alt=""></li>
                            <li class="username">{{$user->firstName}} {{$user->lastName}}</li>
                            <li class="data">{{$leaderboard->total_time}} s</li>

                        </ul>
                    <hr>
                    @endforeach
                </div>

            @endforeach
        </div>



    </div>






@endsection