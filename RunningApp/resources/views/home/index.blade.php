@extends('layout')

@section('title', 'Home')

@section('content')
    @parent

    @if( $loggedIn)
        <h2 class="home_distance_walked">{{$runDistance}} / {{$recomendedTotalDistance}} km</h2>
        <div class="home_content">
            <div class="home_content_stat">
                <img src="img/start_icon.svg" alt=" start icon">
                <h2>Recommended Distance:</h2>

                <h1 class="red_bar_width">{{ $recomendedDistance }} KM Continuously By Sunday!</h1>


                    <p>{{$userName}}</p>


                <h2>Get running!</h2>
            </div>
        </div>
    @else
        <div class="home_content">
            <h2 class="login_call">Log in to start running!</h2>
        </div>
    @endif

@endsection