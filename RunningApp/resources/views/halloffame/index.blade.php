@extends('layout')

@section('title', 'Parcours')
@section('css', 'parcours')

@section('content')
    @parent
    <div class="halloffame_content">
            <ul class="overview">
                <li class="username"><h6>Username</h6></li>
                <li class="data"><h6>Total Time</h6></li>
            </ul>
            @foreach($halloffame as $hof)
            {{$hof->goal}}
                @foreach($hof->user as $user)
                    <ul class="user_leaderboard">
                        <li class="image"><img src="{{$user->avatar_original}}" class="small_avatar" alt=""></li>
                        <li class="username">{{$user->firstName}} {{$user->lastName}}</li>
                    </ul>
                    <hr>

                @endforeach
            @endforeach
        </div>


@endsection