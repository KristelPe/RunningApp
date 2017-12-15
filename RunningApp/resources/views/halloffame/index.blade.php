@extends('layout')

@section('title', 'Parcours')
@section('css', 'parcours')

@section('content')
    @parent
    <div class="halloffame_content">
        <h1>These champions completed this weeks goal!</h1>
        <ul class="container__users">
            @foreach($halloffame as $hof)
                @foreach($hof->user as $user)
                    <li class="image">
                        <img src="{{$user->avatar_original}}" class="small_avatar" alt="">
                        <h3>{{$user->firstName}} {{$user->lastName}}</h3>
                    </li>

                @endforeach
            @endforeach
        </ul>
    </div>


@endsection