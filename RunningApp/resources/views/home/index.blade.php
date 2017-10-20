@extends('layout')

@section('title', 'Home')

@section('content')
    @parent
    <h2 class="home_distance_walked">0 / 15 km</h2>
    <div class="home_content">
        <div class="home_content_stat">
            <img src="img/start_icon.svg" alt=" start icon">
            <h2>Recommended Daily Distance:</h2>
            <h1 class="red_bar_width">0 KM / 15 KM</h1>
            <h2>Get running!</h2>
        </div>
    </div>

@endsection