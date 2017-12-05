@extends('layout')

@section('title', 'Parcours')
@section('css', 'parcours')

@section('content')
    @parent
    <div class="halloffame_content">
        <h5>These champions completed this weeks goal!</h5>
            @foreach($halloffame as $hof)
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